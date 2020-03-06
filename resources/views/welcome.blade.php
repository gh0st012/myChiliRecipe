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


@if (randomRecipe() == !null)
  <div class="is-full-height">
    <div class="recipe_of_the_day">

      <div class="title">
        CHILI OF THE WEEK
        <div class="title_bar">
        </div>
      </div>

      {{-- <img src="/storage/{{ randomRecipe()->image }}" class="user_chili_image" alt=""> --}}
    </div>
  </div>
@endif



@endsection
