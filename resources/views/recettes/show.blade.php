
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

            <div class="card">
              <div class="card-body">
                <div class="my_chili_rating">
                  @if (Auth::guest())
                    Please <a class="" style="color: #cf0c0c" href="{{ route('login') }}"> Login </a> to rate this Chili.
                  @else
                    @if ($recette->ratings->contains('user_id', auth()->user()->id))
                      MyChili Rating: {{ round($recette->averageRating, 2) }} <i class="fas fa-pepper-hot" style="color: #cf0c0c"></i>
                    @else


                      MyChili Rating:
                      <form class="form-horizontal recettestars" onsubmit="alert('Thank you for voting!');" action="{{route('recetteStar', $recette->id)}}" id="addStar" method="POST" style="display: inline-block;">
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
                    @endif
                  @endif
                </div>
                <br>
                Cooking Time: {{ $recette->time }} <i class="fas fa-clock"></i>
                <br>
                Servings: {{ $recette->serving }} <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="recipe_description">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
            <div class="title">
              DESCRIPTION
            </div>
            {{ $recette->description }}
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="lower_recipe_show">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
          <div class="title">
            INGREDIENTS
          </div>
          <div class="ingredients">
            {!! nl2br(e($recette->ingredient)) !!}
          </div>
        </div>
      </div>
    </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <div class="title">
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
  </div>
</div>

<script type="application/javascript">
    $('#addStar').change('.star', function(e) {
    $(this).submit();
    });
</script>




@endsection
