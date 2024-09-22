@extends('layouts.admin')

@section('title', 'Création partie')

@section('adminHeaderTitle', 'Create game')

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

  <form method="POST" action="{{ route('admin.games.store') }}" class="form">
    @csrf
    <div class="form__fields">
      <div class="form__field">
        <label for="hearth_queen_player_id" class="form__label">Joueur ayant la Dame de Cœur</label>
        @if ($players)
          <select name="hearth_queen_player_id" id="hearth_queen_player_id" class="form__input">
            @foreach ($players as $player)
              <option value="{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
          </select>
        @endif
      </div>
    </div>
    <div class="form__bottom">
      <button class="button">Submit</button>
    </div>
  </form>
@endsection
