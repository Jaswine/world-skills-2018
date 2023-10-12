@extends('main')


@section('title', 'Create A New Module')

@section('content')
 <div class='page'>
 <form  method="post" enctype="multipart/form-data">
   <h2>Upload Module</h2>
   @csrf

   <input type="file" name='zip' required />

    <input type="submit" value = 'Continue' class='btn' />
 </form>
 </div>
 <script>
  console.log('I work')
 </script>
@endsection