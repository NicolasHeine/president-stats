@extends('layouts.admin')

@section('title', 'Liste parties')

@section('content')
    <h1>List of games</h1>
    <table>
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
                    <td><a href="{{ route('admin.games.show', ['game' => $game]) }}">See details</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
