@extends('layouts.app')

@section('content')

<div class="container">
  <div class="user_header">
    <div class="row">
      <div class="col-3">
        <img src="{{ asset('user.png') }}" class="user_image"alt="">
      </div>
      <div class="col-9">
        <div class="title">
          {{ $user->name }}
        </div>
        <div class="sub-title">
          {{ count($user->recettes) }} Recipes
        </div>
        <a class="btn primary_button" href="/p/create">NEW RECIPE</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class='container'>
  <div class="user_recipes">
    @foreach($user->recettes as $recette)
      <a class="user_recipe" href="/p/{{ $recette->id }}">
        <div class="row">
          <div class="col-3">
            <img src="/storage/{{ $recette->image }}" class="user_chili_image" alt="">
          </div>
          <div class="col-6">
            <div class="title">
              {{ $recette->name }}
            </div>
            <p> {{ $recette->description }} </p>
          </div>
          <div class="col-3">
            <div class="rating">
              {{ $recette->rating }}
            </div>
            <div class="user_recipe_buttons">
              <button type="button" class="btn btn-link"> Edit </button>
              <button type="button" class="btn btn-link"> Delete </button>
            </div>

          </div>
        </div>
      </a>
    @endforeach
  </div>
</div>
@endsection
