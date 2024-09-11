@extends('layouts/app')

@section('content')
<h1>REGISTER</h1>
<form action="{{ route('userRegister') }}" method="post">
  @csrf
  @method('POST')
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name"  required>
        
    </div>

    <div>
        <label for="name">Apellido:</label>
        <input type="text" name="lastName" required>
        
    </div>

    <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email"  required>
        
    </div>

    <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <div>
        <button type="submit">Registrarse</button>
        {{-- <a href="{{ route('auth.login') }}">Registrarse</a> --}}
    </div>
</form>
{{-- <form>
    <h1>Registro</h1>
    <div>
      <label for="name">Nombre(S): </label>
      <input type="text" id="name" />
    </div>
    <div>
        <label for="lastname">Apellidos: </label>
        <input type="text" id="lastname"  />
    </div>
    <div>
        <label for="email">Correo electronico: </label>
        <input type="text" id="email"  />
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" id="password"  />
    </div>
    <div>
        <label for="confirmPassword">Confirm Password: </label>
        <input type="password" id="confirmPassword"  />
    </div>
    <div>
      <button>Submit</button>
    </div>
  </form> --}}
    
@endsection