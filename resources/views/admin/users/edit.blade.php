<h1>Edit User Admin</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="email" name="email" value="{{ $user->email }}">
    <input type="password" name="password">
    <input type="password" name="new_password">
    <button>submit</button>
</form>
