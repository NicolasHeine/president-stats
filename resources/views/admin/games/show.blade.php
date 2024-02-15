@extends('layouts.admin')

@section('title', 'Partie')

@section('adminHeaderTitle')
  Game {{ $game->id }}
@endsection

@section('content')
  <div>Dame de coeur : {{ $player::find($game->hearth_queen_player_id)->name }}</div>
  <a href="{{ route('admin.games.rounds', ['game' => $game]) }}" class="button">See rounds</a>
@endsection

