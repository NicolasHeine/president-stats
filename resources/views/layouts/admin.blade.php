@extends('layouts.main')

@section('assets')
    @parent
    @vite('resources/scss/admin.scss')
@endsection

@section('main')
    <div class="admin">
        <aside class="adminSide">
            <header class="adminSide__header">
                <h1 class="adminSide__title">Admin Stats</h1>
            </header>
            @include('admin.components.menu')
        </aside>
        <main class="adminMain">
            @yield('content')
        </main>
    </div>
@endsection
