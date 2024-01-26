<div>
    <h1>List of users</h1>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Is admin</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if ($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', ['user' => $user]) }}">See profil</a>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Edit profil</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
