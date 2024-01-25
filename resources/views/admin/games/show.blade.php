Show {{ $game->id }}

<a href="{{ route('admin.games.rounds', ['game' => $game]) }}">See rounds</a>
<a href="{{ route('admin.games.rounds.create', ['game' => $game]) }}">Add round</a>
