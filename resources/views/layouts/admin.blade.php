@extends('layouts.main')

@section('assets')
  @parent
  @vite('resources/scss/admin.scss')
@endsection

@section('js')
  @parent
  @vite('resources/js/admin.js')
@show

@section('main')
  <div class="admin">
    <aside class="adminSide">
      <header class="adminSide__header">
        <h1 class="adminSide__title">Admin Stats</h1>
      </header>
      <div class="adminSide__menu">
        <button class="adminSide__menu__button js-admin-menu-toggle">
          <span></span>
          <span></span>
          <span></span>
        </button>
        @include('admin.components.menu')
      </div>
    </aside>
    <main class="adminMain">
      @section('adminHeader')
        <div class="adminMain__header">
          <div class="adminMain__header__main">
            <h1 class="adminMain__header__title">@yield('adminHeaderTitle')</h1>
          </div>
          <div class="adminMain__header__side">@yield('adminHeaderSide')</div>
        </div>
      @show
      @yield('content')
    </main>
  </div>
@endsection
