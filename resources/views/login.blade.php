@extends('layouts.main')

@section('title', 'Login')

@section('main')
  <div class="login">
    <div class="login__container">
      <h1 class="login__title">Login</h1>
      <div class="login__form">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="form">
          @csrf
          <div class="form__fields">
            <div class="form__field">
              <label for="email" class="form__label">E-mail</label>
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="form__input">
            </div>
            <div class="form__field">
              <label for="password" class="form__label">Mot de passe</label>
              <input type="password" name="password" id="password" class="form__input">
            </div>
          </div>
          <div class="form__bottom">
            <button class="button">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
