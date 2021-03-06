@extends('layouts.main')

@section('content')
    <h1>Registro de usuario</h1>
    <form action="{{ route('auth.do-register') }}" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="name" id="">
        <br>
        <label for="">Email</label>
        <input type="text" name="email" id="">
        <br>
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <br>
        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" id="">
        <br>
        <label for="">Rol</label>
        <input type="text" name="rol" id="">
        <br>
        <input type="submit" value="Registrarse">
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

