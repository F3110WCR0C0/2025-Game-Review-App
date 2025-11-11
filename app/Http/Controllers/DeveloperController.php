<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Game;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::with('games')->get();
        return view('developers.index', compact('developers'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('developers.index')->with('error','Access denied.');
        }

        $games = Game::all();
        return view('developers.create', compact('games'));
    }

    public function store(Request $request)
    {
        // Store validated data in $validated
        $validated = $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'company'=> 'required',
        ]);

        $developer = Developer::create($validated);

        if ($request->has('games')) {
            $developer->games()->attach($request->games);
        }

        return to_route('developers.index')->with('success', 'Developer created successfully!');
    }

    public function show(Developer $developer)
    {
        $developer->load('feedbacks.user');
        return view('developers.show', compact('developer'));
    }

    public function edit(Developer $developer)
    {
        $games = Game::all();
        $developerGames = $developer->games->pluck('id')->toArray();
        return view('developers.edit', compact('developer','games','developerGames'));
    }

    public function update(Request $request, Developer $developer)
    {
        $validated = $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'company'=> 'required',
        ]);

        $developer->update($validated);

        if ($request->has('games')) {
            $developer->games()->sync($request->games);
        }

        return redirect()->route('developers.index')->with('success', 'Developer updated successfully!');
    }

    public function destroy(Developer $developer)
    {
        $developer->games()->detach();
        $developer->delete(); 

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully!');
    }
}
