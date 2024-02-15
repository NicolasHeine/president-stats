@extends('layouts.admin')

@section('title', 'Modification utilisateur')

@section('adminHeaderTitle', 'Edit player')

@section('adminHeaderSide')
  <a href="{{ route('admin.players') }}" class="button --danger">Return</a>
@endsection

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


    <form method="POST" action="{{ route('admin.players.update', ['player' => $player]) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $player->name }}">
        <button>submit</button>
    </form>
@endsection
