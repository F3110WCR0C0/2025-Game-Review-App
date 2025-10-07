<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'release_date'=> 'required|date',
            'age_rating'=> 'required|integer',
            'price'=> 'required|decimal',
            'discount'=> 'required|decimal',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extentions();
            $request->image->move(public_path('images/games'), imageName);
        }
        
        Game::create([
            'name'=> $request->name,
            'release_date'=> $request->release_date,
            'age_rating'=> $request->age_rating,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'image'=> $imageName
        ]);  

        return to_route('games.index')->with('success', 'Game created successfully!');
    }

  
    public function show(Game $game)
    {
        return view('games.show')->with('game',$game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
