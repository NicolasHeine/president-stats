@extends('layouts.admin')

@section('title', 'Création partie')

@section('adminHeaderTitle', 'Create round')

@section('content')
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

  <form method="POST" action="{{ route('admin.games.rounds.store', ['game' => $game]) }}" class="form">
    @csrf
    <div class="form__fields">
      @if ($players)
        <div class="form__field">
          <div class="form__label">Joueurs :</div>
          <div class="form__checkboxs">
            @foreach ($players as $player)
              <div class="form__checkbox">
                <input type="checkbox" name="players[]" value="{{ $player->id }}" id="player_{{ $player->id }}"
                       @if ($lastRound && $lastRound->players()->find($player->id)) checked @endif>
                <label for="player_{{ $player->id }}">{{ $player->name }}</label>
              </div>
            @endforeach
          </div>
        </div>
        <div class="form__field">
          <label for="president_player_id" class="form__label">Président</label>
          <select name="president_player_id" id="president_player_id" class="form__input">
            <option value="">-</option>
            @foreach ($players as $player)
              <option value="{{ $player->id }}"
                      @if ($lastRound && $lastRound->president_player_id == $player->id) selected @endif>{{ $player->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form__field">
          <label for="vice_president_player_id" class="form__label">Vice-président</label>
          <select name="vice_president_player_id" class="form__input">
            <option value="">-</option>
            @foreach ($players as $player)
              <option value="{{ $player->id }}"
                      @if ($lastRound && $lastRound->vice_president_player_id == $player->id) selected @endif>{{ $player->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form__field">
          <label for="vice_trou_player_id" class="form__label">Vice-trou d'uc</label>
          <select name="vice_trou_player_id" class="form__input">
            <option value="">-</option>
            @foreach ($players as $player)
              <option value="{{ $player->id }}"
                      @if ($lastRound && $lastRound->vice_trou_player_id == $player->id) selected @endif>{{ $player->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form__field">
          <label for="trou_player_id" class="form__label">Trou d'uc</label>
          <select name="trou_player_id" class="form__input">
            <option value="">-</option>
            @foreach ($players as $player)
              <option value="{{ $player->id }}"
                      @if ($lastRound && $lastRound->trou_player_id == $player->id) selected @endif>{{ $player->name }}</option>
            @endforeach
          </select>
        </div>
      @endif
    </div>
    <div class="form__bottom">
      <button class="button">Submit</button>
    </div>
  </form>
@endsection
