@extends('layouts.admin')

@section('title', 'Utilisateur')

@section('adminHeaderTitle')
  Show {{ $user->name }}
@endsection

@section('adminHeaderSide')
  <a href="{{ route('admin.users.edit', ['user' => $user]) }}" class="button --warning">Edit user</a>
  <a href="{{ route('admin.users') }}" class="button --danger">Return</a>
@endsection

