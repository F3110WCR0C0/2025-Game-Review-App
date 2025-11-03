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
        if (auth()->user()->role !== 'admin'){
            return redirect()->route('games.index')->with('error','Access denied.');
        }
        
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

        // Ensureing the file has an image
        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
        }
        Game::create([
            // creating a database with these cplumns
            'name'=> $request->name,
            'release_date'=> $request->release_date,
            'age_rating'=> $request->age_rating,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'image'=> $imageName,
            // the now() sets the data to the current time
            'updated_at'=> now(),
            'created_at'=> now()
        ]);  


        // After storing the data the web application sends you to the game index
        return to_route('games.index')->with('success', 'Game created successfully!');
    }

  
    public function show(Game $game)
    {
        // brings you to game show
        return view('games.show')->with('game',$game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        // brings you to games edit
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */
    public function update(Request $request, Game $game)
    {
        // validates all data given when updating a game
        $request->validate([
            'name'=> 'required',
            'release_date'=> 'required|date',
            'age_rating'=> 'required|integer',
            'price'=> 'required|decimal:2',
            'discount'=> 'required|decimal:2',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

 
        // Handle image upload if provided
        // images are handled differently to the other fields so this chunk of code ensures its all okay
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
 
        // sends the user to the games index with an alert success
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
       
        // deletes a game
        $game->delete();
 
        // sends user to the games index page
        return redirect()
            ->route('games.index')
            ->with('success', 'Game deleted successfully!');
    }
}
