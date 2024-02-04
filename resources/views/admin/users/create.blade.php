@extends('layouts.admin')

@section('title', 'Création utilisateur')

@section('content')
    <h1>Create User Admin</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        <input type="email" name="email" value="{{ old('email') }}">
        <input type="password" name="password">
        <button>submit</button>
    </form>
@endsection
