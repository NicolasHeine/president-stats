<div>
    <a href="{{ route('admin.games') }}">Return</a>
    <h1>Game {{ $game->id }}</h1>
    <div>Dame de coeur : {{ $player::find($game->hearth_queen_player_id)->name }}</div>
    <a href="{{ route('admin.games.rounds', ['game' => $game]) }}">See rounds</a>
</div>
