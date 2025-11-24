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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin'){
            return redirect()->route('games.index')->with('error','Access denied.');
        }

        // Get all developers
        $developers = \App\Models\Developer::all();

        return view('games.create', compact('developers'));
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
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=> 'required'
        ]);

        // Ensureing the file has an image
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

        // Sync developers if any are selected
        if ($request->has('developers')) {
            $game->developers()->sync($request->developers);
        }


        // After storing the data the web application sends you to the game index
        return to_route('games.index')->with('success', 'Game created successfully!');
    }

  
    public function show(Game $game)
    {
        // Might need to change location to FeedbackController
        $game->load('feedbacks.user', 'developers');
        // brings you to game show
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $developers = \App\Models\Developer::all(); // <-- add this
        return view('games.edit', compact('game', 'developers'));
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
            'description'=> 'required',
            'age_rating'=> 'required|integer',
            'price'=> 'required|decimal:2',
            'discount'=> 'required|decimal:2',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // nullable so you don't need to re-upload
        ]);
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $imageName);
            $game->image = $imageName;
        }
    
        // Update fields
        $game->name = $request->name;
        $game->release_date = $request->release_date;
        $game->description = $request->description;
        $game->age_rating = $request->age_rating;
        $game->price = $request->price;
        $game->discount = $request->discount;
    
        $game->save();
    
        // Sync developers
        $game->developers()->sync($request->developers ?? []); // ensures none are selected if empty
    
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
