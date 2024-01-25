<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.games.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create', [
            'players' => Player::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $validated = $request->safe()->all();

        $game = new Game();
        $game->hearth_queen_player_id = $validated['hearth_queen_player_id'];
        $game->save();

        return to_route('admin.games.show', ['game' => $game]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', [
            'game' => $game
        ]);
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
    public function update(UpdateGameRequest $request, Game $game)
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
