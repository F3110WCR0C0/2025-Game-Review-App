<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Developer;

class DeveloperController extends Controller
{
    public function index(Request $request)
    {
        $query = Developer::with('games');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
        }

        $developers = $query->get();

        return view('developers.index', compact('developers'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('developers.index')->with('error','Access denied.');
        }

        $games = Game::all();
        return view('developers.create', compact('games'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'company'=> 'required',
            'bio' => 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/developers'), $imageName);
            $validated['image'] = $imageName;
        }

        $developer = Developer::create($validated);

        if ($request->has('games')) {
            $developer->games()->sync($request->games);
        }

        return redirect()->route('developers.index')->with('success', 'Developer created successfully!');
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function show(Developer $developer)
    {
        return view('developers.show', compact('developer'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function edit(Developer $developer)
    {
        $games = Game::all();
        $developerGames = $developer->games->pluck('id')->toArray();
        return view('developers.edit', compact('developer','games','developerGames'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function update(Request $request, Developer $developer)
    {
        $validated = $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'company'=> 'required',
            'bio' => 'required',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // optional on update
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/developers'), $imageName);
            $validated['image'] = $imageName;
        }

        $developer->update($validated);

        $developer->games()->sync($request->games ?? []);

        return redirect()->route('developers.index')->with('success', 'Developer updated successfully!');
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function destroy(Developer $developer)
    {
        if ($developer->image && file_exists(public_path('images/developers/' . $developer->image))) {
            unlink(public_path('images/developers/' . $developer->image));
        }

        $developer->games()->detach();
        $developer->delete();

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully!');
    }
}
