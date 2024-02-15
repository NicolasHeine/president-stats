@extends('layouts.admin')

@section('title', 'Liste rounds')

@section('adminHeaderTitle')
  Game {{ $game->id }}
@endsection

@section('adminHeaderSide')
  <a href="{{ route('admin.games.show', ['game' => $game]) }}" class="button --danger">Return</a>
  <a href="{{ route('admin.games.rounds.create', ['game' => $game]) }}" class="button">Add round</a>
@endsection

@section('content')
  <table class="admin__table">
    <thead>
    <tr>
      <th>#</th>
      <th>Président</th>
      <th>Vice-président</th>
      <th>Vice-trou d'uc</th>
      <th>Trou d'uc</th>
    </tr>
    </thead>
    <tbody>
    @if ($game->rounds)
      @foreach($game->rounds as $round)
        <tr>
          <td>{{ $round->id }}</td>
          <td>{{ $player::find($round->president_player_id)->name }}</td>
          <td>{{ $player::find($round->vice_president_player_id)->name }}</td>
          <td>{{ $player::find($round->vice_trou_player_id)->name }}</td>
          <td>{{ $player::find($round->trou_player_id)->name }}</td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@endsection
