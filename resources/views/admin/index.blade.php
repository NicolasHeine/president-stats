@extends('layouts.admin')

@section('title', 'Dashboard admin')

@section('adminHeaderTitle')
  Bonjour {{ $user->name }}
@endsection
