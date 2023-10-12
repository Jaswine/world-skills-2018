@extends('main')


@section('title', 'Create A New Project')

@section('content')
 <div class='page'>
 <form  method="post" enctype="multipart/form-data">
   <h2>Create A New Project</h2>
   @csrf

   {{-- <input type="file" name='zip' required /> --}}

   <input type="text" class="" placeholder="enter your name" name="name" value="{{old('name')}}" required />
      
   @error('name')
   <div class='message'>{{$message}}</div>
   @enderror

   <input type="text" class="" placeholder="enter your login for wifi" name="login" value="{{old('login')}}" required/>
   
   @error('login')
   <div class='message'>{{$message}}</div>
   @enderror

   <input type="text" class="" placeholder="enter your password for wifi" name="password" value="{{old('password')}}" required />
   
   @error('password')
   <div class='message'>{{$message}}</div>
   @enderror

    <input type="submit" value = 'Continue' class='btn' />
 </form>
 </div>
 <script>
  console.log('I work')
 </script>
@endsection