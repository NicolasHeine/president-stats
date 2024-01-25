<h1>Create Player</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.players') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    <button>submit</button>
</form>
