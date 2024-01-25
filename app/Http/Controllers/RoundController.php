<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Round;
use App\Http\Requests\StoreRoundRequest;
use App\Http\Requests\UpdateRoundRequest;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Game $game)
    {
        return view('admin.games.rounds.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Game $game)
    {
        return view('admin.games.rounds.create', [
            'game' => $game,
            'lastRound' => $game->rounds ? $game->rounds()->orderBy('created_at', 'desc')->first() : false,
            'players' => Player::all()->sortBy('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoundRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $validated = $request->safe()->all();

        $round = new Round();
        $round->game_id = $validated['game_id'];
        $round->president_player_id = $validated['president_player_id'];
        $round->vice_president_player_id = $validated['vice_president_player_id'];
        $round->trou_player_id = $validated['trou_player_id'];
        $round->vice_trou_player_id = $validated['vice_trou_player_id'];
        $round->save();
        $round->players()->attach($request->input('players'));

        return to_route('admin.games.rounds.create', ['game' => $validated['game_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game, Round $round)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game, Round $round)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoundRequest $request, Game $game, Round $round)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game, Round $round)
    {
        //
    }
}
