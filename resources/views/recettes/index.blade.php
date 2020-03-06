
@extends('layouts.app')
@section('content')


<div class="py-4">
  <div class="container">
    <div class="index">

    <div class="upper_index">
      <div class="search_bar">
        <div class="big_title">
          SEARCH CHILI
          <div class="title_bar"></div>
        </div>


        <form action="/search" method="POST" role="search" id="index_search_box">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search Chili"> <span class="input-group-append">
                    <button type="submit" class="btn search_button">
                      <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>




      </div>
    </div>

    <div class="lower_index">
      <div class="big_title">
        ALL CHILI'S
        <div class="title_bar"></div>
      </div>
      <br>

        @foreach($recettes as $recette)
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

  </div>
</div>
</div>

@endsection
