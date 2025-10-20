<?php
namespace App\Http\Controllers;
// Might not need to go here
use Illuminate\Support\Facades\Storage;

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
            'price'=> 'required|decimal:2',
            'discount'=> 'required|decimal:2',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
        }
        Game::create([
            'name'=> $request->name,
            'release_date'=> $request->release_date,
            'age_rating'=> $request->age_rating,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'image'=> $imageName,
            'updated_at'=> now(),
            'created_at'=> now()
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
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name'=> 'required',
            'release_date'=> 'required|date',
            'age_rating'=> 'required|integer',
            'price'=> 'required|decimal:2',
            'discount'=> 'required|decimal:2',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

 
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
            $game->image = $imageName;
        }
 
        // Update the Fields
        $game->name = $request->name;
        $game->release_date = $request->release_date;
        $game->age_rating = $request->age_rating;
        $game->price = $request->price;
        $game->discount - $request->discount;
 
        // Save changes
        $game->save();
 
        return redirect()
            ->route('games.index')
            ->with('success', 'Game updated successfully!');
    }       
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // If the game has an image, delete it from storage
        if ($game->image && file_exists(public_path('images/games/' . $game->image))) {
            unlink(public_path('images/games/' . $game->image));
        }
       
        $game->delete();
 
        return redirect()
            ->route('games.index')
            ->with('success', 'Game deleted successfully!');
    }
}
