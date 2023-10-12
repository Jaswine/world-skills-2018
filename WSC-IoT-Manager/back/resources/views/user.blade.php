@extends('main')

@section('title', 'Auth page')

@section('content')
<div class="page">
   <form action="" method="post">
      <h3>{{ $user }}</h3>
      <h2>Generate New Token</h2>
      @csrf

      <input type="text" class="" placeholder="enter your token" name="token" required value="{{old('token')}}" />
      
      @error('token')
      <div class='message'>{{$message}}</div>
      @enderror

      <button>Continue</button>
      <div class="tokens">
         <div class="token">
            <h2>Token: </h2>
            <h3>{{ auth()->user()->token  }}</h3>
         </div>
      </div>
   </form>
</div>

<style>
   .token {
      display: flex;
      justify-content: space-between;
      align-items: center;
   }
</style>
@endsection