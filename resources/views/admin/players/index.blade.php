@extends('layouts.admin')

@section('title', 'Liste joueurs')

@section('adminHeaderTitle', 'List of players')

@section('content')
  <table class="admin__table">
    <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @if ($players)
      @foreach($players as $player)
        <tr>
          <td>{{ $player->id }}</td>
          <td>{{ $player->name }}</td>
          <td><a href="{{ route('admin.players.edit', ['player' => $player]) }}" class="button --warning">Edit player</a></td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@endsection
