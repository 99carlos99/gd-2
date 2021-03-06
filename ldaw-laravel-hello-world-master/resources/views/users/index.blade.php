@extends('layouts.main')

@section('content')
<h1>List of Users</h1>
<p>
    @auth
        <a href="{{ route('users.create') }}">Create a user</a>
        <a href="{{ route('auth.logout') }}">Logout</a>
    @endauth
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->rol }}</td>

                <td>
                    @auth
                        @if ( auth()->user()->rol  === 'super')
                            <form action="{{ route('users.destroy', ['user' => $item]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete">
                            </form>
                        @endif
                    @endauth
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
