<h1>Create round</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Round {{ count($game->rounds) + 1 }}</h2>

<form method="POST" action="{{ route('admin.games.rounds.store', ['game' => $game]) }}">
    @csrf
    <input type="hidden" name="game_id" value="{{ $game->id }}">
    @if ($players)
        Joueurs :<br>
        @foreach ($players as $player)
            <label>
                <input type="checkbox" name="players[]" value="{{ $player->id }}"@if ($lastRound && $lastRound->players()->find($player->id)) checked @endif> {{ $player->name }}
            </label><br>
        @endforeach
        <label>
            Président
            <select name="president_player_id">
                <option value="">-</option>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}"@if ($lastRound && $lastRound->president_player_id == $player->id) selected @endif>{{ $player->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Vice-président
            <select name="vice_president_player_id">
                <option value="">-</option>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}"@if ($lastRound && $lastRound->vice_president_player_id == $player->id) selected @endif>{{ $player->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Trou d'uc
            <select name="trou_player_id">
                <option value="">-</option>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}"@if ($lastRound && $lastRound->trou_player_id == $player->id) selected @endif>{{ $player->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Vice-trou d'uc
            <select name="vice_trou_player_id">
                <option value="">-</option>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}"@if ($lastRound && $lastRound->vice_trou_player_id == $player->id) selected @endif>{{ $player->name }}</option>
                @endforeach
            </select>
        </label>
    @endif

    <button>submit</button>
</form>
