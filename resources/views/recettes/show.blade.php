
@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="upper_recipe_show">
      <div class="row">
        <div class="col-6">
          <img src="/storage/{{ $recette->image }}" class="chili_image" alt="">
        </div>
        <div class="col-6">
          <div class="title">
            {{ $recette->name }}
          </div>
          by
          <a class="" href="/profile/{{ $recette->user->id }}">
            {{ $recette->user->name }}
          </a>
          <br>
          <div class="recipe_information" style="display: inline-block;">
            <i class="fas fa-star"></i> Rating:
            <br>
            <i class="fas fa-clock"></i> Cooking Time:
            <br>
            <i class="fas fa-users"></i> Servings:
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="sub-title" style="display:inline-block;">
            DESCRIPTION:
          </div>
          {{ $recette->description }}
        </div>
      </div>
    </div>
  </div>





  <div class="container">
    <div class="lower_recipe_show">
      <div class="row">
        <div class="col-6">
          <div class="sub-title">
            INGREDIENTS
          </div>
          <div class="ingredients">
            {!! nl2br(e($recette->ingredient)) !!}
          </div>
        </div>
        <div class="col-6">
          <div class="sub-title">
            INSTRUCTIONS
          </div>
          <div class="instructions">
            {!! nl2br(e($recette->instruction)) !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
