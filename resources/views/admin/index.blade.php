@extends('layouts.admin')

@section('title', 'Dashboard admin')

@section('content')
    <h1>Bonjour {{ $user->name }}</h1>
@endsection
