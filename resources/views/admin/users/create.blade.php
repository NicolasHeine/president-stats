<h1>Create Admin</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{ route('admin.users') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    <input type="email" name="email" value="{{ old('email') }}">
    <input type="password" name="password">
    <button>submit</button>
</form>
