@extends('layouts.main')

@section('assets')
    @parent
    @vite('resources/scss/admin.scss')
@endsection

@section('main')
    <div class="ad">
        <aside class="adSide">
            <header class="adSide__header">
                <h1 class="adSide__title">Admin Stats</h1>
            </header>
            @include('admin.components.menu')
        </aside>
        <main class="adMain">
            @yield('content')
        </main>
    </div>
@endsection
