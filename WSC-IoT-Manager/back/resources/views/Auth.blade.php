@extends('main')

@section('title', 'Auth page')

@section('content')
<div class="page">
   @auth
   <h1>You looged <a href='/xxx-m2.wsr.ru/logout'>Logout</a></h1>
   @else
   <form action="" method="post">
      @if($page_type == 'login')
      <h2>Login</h2>
      @else
      <h2>Register</h2>
      @endif
      @csrf

      <input type="email" class="" placeholder="enter your email" name="email" value="{{old('email')}}" />
      
      @error('email')
      <div class='message'>{{$message}}</div>
      @enderror

      <input type="password" class="" placeholder="enter your password" name="password" value="{{old('password')}}" />
      
      @error('password')
      <div class='message'>{{$message}}</div>
      @enderror

      @if($page_type == 'login')
      <button>Continue</button>
      <p>You don't have an account? <a href="/xxx-m2.wsr.ru/register">Register</a></p>
      @else
      <button>Continue</button>
      <p>You don't have an account? <a href="/xxx-m2.wsr.ru/login">Login</a></p>
      @endif
   </form>
   @endauth
</div>
@endsection