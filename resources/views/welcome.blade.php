@extends('layouts.app')

@section('content')

  <div class="homepage is-full-height">
    <div class="homepage_jumbotron_wrapper">
      <div class="homepage_jumbotron">
        <img src="{{ asset('MyChiliLogo.png') }}">
        <a class="btn primary_button" href="/register"> GET STARTED </a>
      </div>
    </div>
  </div>

<div class="is-full-height">
  {{ randomRecipe()->image }}
    <img src="/storage/{{ randomRecipe()->image }}" class="user_chili_image" alt="">
</div>




@endsection
