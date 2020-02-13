
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
             Rating: N/A <i class="fas fa-star"></i>
            <br>
             Spiciness: N/A <i class="fas fa-pepper-hot"></i>
            <br>
             Cooking Time: N/A <i class="fas fa-clock"></i>
            <br>
             Servings: N/A <i class="fas fa-users"></i>
          </div>
        </div>
      </div>
      <div class="recipe_description">
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
