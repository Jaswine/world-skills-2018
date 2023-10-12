@extends('main')

@section('title', 'All Projects')

@section('content')
<div class="page">
   <div class="page__header">
      <h1>Modules <span>{{ count($modules) }}</span></h1>
      @auth
      <a href="/xxx-m2.wsr.ru/create-module" class="btn">Add A New Module</a>
      @endauth
   </div>
   <div class="page__modules">
      @foreach($modules as $module)
        <div class="page__module">
            <h3>{{ $module->name }}</h3>
            <div class="page__module__buttons">
               <a href="uploads/{{ $module->archive }}" class="btn download" type="download" >Download Zip</a>
               <a href="modules/{{ $module->id }}/delete" class="btn">Delete</a>
            </div>
        </div>
    @endforeach
   </div>
</div>
@endsection