
@extends('layouts.app')

@section('content')
  <div class="py-4">
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
          <div class="recipe_information">
              Rating:
              <form class="form-horizontal recettestars" action="{{route('recetteStar', $recette->id)}}" id="addStar" method="POST" style="display: inline-block;">
                {{ csrf_field() }}
                <div class="form-group required">
                  <div class="col-sm-12">
                    <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1"></label>
                  </div>
                </div>
              </form>

              Real rating gg :{{ $recette->averageRating }}



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
            <div class="sub-title">
              DESCRIPTION
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
</div>

<script type="application/javascript">
    $('#addStar').change('.star', function(e) {
    $(this).submit();
    });
</script>




@endsection
