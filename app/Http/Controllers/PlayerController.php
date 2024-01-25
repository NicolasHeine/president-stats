<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.players.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $validated = $request->safe()->all();

        $player = new Player();
        $player->name = $validated['name'];
        $player->save();

        return to_route('admin.players.show', [
            'player' => $player
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('admin.players.show', [
            'player' => $player
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
