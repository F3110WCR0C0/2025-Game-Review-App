<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Game;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Game $game)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:1000',
        ]);

        Feedback::create([
            'game_id' => $game->id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'name' => auth()->user()->name,
            'feedback' => $request->feedback,
            'hours_played' => $request->hours_played ?? 0,
        ]);

        return redirect()->route('games.index', $game)->with('success', 'Feedback submitted!');
    }

    public function show(Feedback $feedback)
    {
        //
    }

    public function edit(Feedback $feedback)
    {
        if (auth()->user()->id != $feedback->user_id && auth()->user()->role != 'admin') {
            return redirect()->route('games.index')->with('error', 'Access denied.');
        }
        return view('feedbacks.edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update($request->only(['rating', 'feedback']));
        return redirect()->route('games.show', $feedback->game_id)
                         ->with('success', 'Feedback updated successfully.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
 
        // sends user to the games index page
        return redirect()
            ->route('games.index')
            ->with('success', 'Feedback deleted successfully!');
    }
}