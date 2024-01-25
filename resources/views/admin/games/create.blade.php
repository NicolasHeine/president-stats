<h1>Create game</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.games.store') }}">
    @csrf
    @if ($players)
        <select name="hearth_queen_player_id">
            @foreach ($players as $player)
                <option value="{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
        </select>
    @endif
    <button>submit</button>
</form>
