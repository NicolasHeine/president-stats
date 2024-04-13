@extends('layouts.main')

@section('title', 'Accueil')

@section('js')
    @parent
    @vite('resources/js/app.js')
@show

@section('main')
    <div id="app">
        <stats-container />
    </div>
@endsection