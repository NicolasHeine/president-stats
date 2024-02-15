@extends('layouts.admin')

@section('title', 'Liste utilisateurs')

@section('adminHeaderTitle', 'List of users')

@section('content')
    <table class="admin__table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Is admin</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if ($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', ['user' => $user]) }}" class="button">See profil</a>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}" class="button --warning">Edit profil</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
