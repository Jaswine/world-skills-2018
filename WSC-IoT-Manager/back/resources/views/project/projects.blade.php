@extends('main')

@section('title', 'All Projects')

@section('content')
<div class="page">
   <div class="page__header">
      <h1>Projects  <span>{{ count($projects) }}</span></h1>
      @auth
      <a href="/xxx-m2.wsr.ru/create-project" class="btn">Add A New Project</a>
      @endauth
   </div>

   <div class="page__modules">
      @foreach($projects as $module)
        <div class="page__module">
            <h3>{{ $module->name }}</h3>

            <p><b>Login: </b> {{   $module->login_from_wifi }}</p>
            <p><b>Password: </b>{{   $module->password_from_wifi }}</p>

             <div class="page__module__buttons">
               <a href="uploads" class="btn download" type="download" >Download Zip</a>
               <a href="projects/{{ $module->id }}/delete" class="btn">Delete</a>
            </div>
        </div>
    @endforeach
   </div>
</div>
<style>
.page__module p {
   width: 100%;
   font-size: 18px
}
</style>
@endsection