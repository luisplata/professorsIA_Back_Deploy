@extends('layouts/app')

@section('content')

<form action="{{ route('loggingin') }}" method="post">
  @csrf
  @method('POST')
    <h1>Login</h1>
    <div>
      <label for="email">Email: </label>
      <input type="text" id="email" name="email" />
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" />
      </div>
    <div>
      <button>Submit</button>
    </div>
  </form>
    
@endsection