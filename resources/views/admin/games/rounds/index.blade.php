@extends('layouts.admin')

@section('title', 'Liste rounds')

@section('content')
    <a href="{{ route('admin.games.show', ['game' => $game]) }}">Return</a>
    <h1>Game {{ $game->id }}</h1>
    <a href="{{ route('admin.games.rounds.create', ['game' => $game]) }}">Add round</a>
    <table>
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
