<?php
namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }
        $games = $query->get();

        return view('games.index', compact('games'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        if (auth()->user()->role !== 'admin'){
            return redirect()->route('games.index')->with('error','Access denied.');
        }

        $developers = \App\Models\Developer::all();

        return view('games.create', compact('developers'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'release_date'=> 'required|date',
            'age_rating'=> 'required|integer',
            'price'=> 'required|decimal:2',
            'discount'=> 'required|decimal:2',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=> 'required'
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
        }
        $game = Game::create([
            'name'=> $request->name,
            'release_date'=> $request->release_date,
            'age_rating'=> $request->age_rating,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'image'=> $imageName,
            'description'=> $request->description,
            'updated_at'=> now(),
            'created_at'=> now()
        ]);

        if ($request->has('developers')) {
            $game->developers()->sync($request->developers);
        }

        return to_route('games.index')->with('success', 'Game created successfully!');
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function show(Game $game)
    {
        $game->load('feedbacks.user', 'developers');
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $developers = \App\Models\Developer::all(); 
        return view('games.edit', compact('game', 'developers'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name'=> 'required',
            'release_date'=> 'required|date',
            'description'=> 'required',
            'age_rating'=> 'required|integer',
            'price'=> 'required|decimal:2',
            'discount'=> 'required|decimal:2',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
            $game->image = $imageName;
        }

        $game->name = $request->name;
        $game->release_date = $request->release_date;
        $game->description = $request->description;
        $game->age_rating = $request->age_rating;
        $game->price = $request->price;
        $game->discount = $request->discount;

        $game->save();

        $game->developers()->sync($request->developers ?? []); 

        return redirect()
            ->route('games.index')
            ->with('success', 'Game updated successfully!');
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function destroy(Game $game)
    {
        if ($game->image && file_exists(public_path('images/games/' . $game->image))) {
            unlink(public_path('images/games/' . $game->image));
        }
       
        $game->delete();

        return redirect()
            ->route('games.index')
            ->with('success', 'Game deleted successfully!');
    }
}
