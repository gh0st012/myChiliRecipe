@extends('layouts.app')

@section('content')

<div class="container">
  <div class="user_header">
    <div class="row">
      <div class="col-3">

        <img src="{{ asset('user.png') }}" class="user_image">
      </div>
      <div class="col-9">
        <div class="title">
          {{ $user->name }}
        </div>
        @can('update', $user->profile)
          <a class="btn primary_button" href="/recipe/create">NEW RECIPE</a>
        @endcan
        <div class="sub-title">
          @if (count($user->recettes) >= 2)
            {{ count($user->recettes) }} Recipes
          @else
            {{ count($user->recettes) }} Recipe
          @endif
          <br>
          My Chili Recipe Avg. Rating: N/A <i class="fas fa-star"></i>
        </div>


        </div>
      </div>
    </div>
  </div>
</div>

<div class='container'>
  <div class="user_recipes">
    @foreach($user->recettes as $recette)
      <div class="user_recipe">
        <div class="row">
          <div class="col-3">
            <img src="/storage/{{ $recette->image }}" class="user_chili_image" alt="">
          </div>
          <div class="col-6">
            <a class="title" href="/recipe/{{ $recette->id }}">
              {{ $recette->name }}
            </a>
            <p> {{ $recette->description }} </p>
          </div>
          <div class="col-3">
            <div class="rating">
              {{ round($recette->averageRating, 2) }} / 5
            </div>
            <div class="user_recipe_buttons">
              @can('update', $recette)
                <a class="btn btn-link" href="/recipe/{{ $recette->id }}/edit">Edit </a>
                <form action="/recipe/{{ $recette->id }}" method="post" style="display:inline-block;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-link" onclick="return confirm('Are you sure you want to delete this recipe?')" type="submit">Delete</button>
                </form>
              @endcan
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
