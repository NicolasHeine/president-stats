@extends('layouts.admin')

@section('title', 'Liste parties')

@section('adminHeaderTitle', 'List of games')

@section('content')
  <table class="admin__table">
    <thead>
    <tr>
      <th>#</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @if ($games)
      @foreach($games as $game)
        <tr>
          <td>{{ $game->id }}</td>
          <td><a href="{{ route('admin.games.show', ['game' => $game]) }}" class="button">See details</a></td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@endsection
