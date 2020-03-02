
@extends('layouts.app')

@section('content')

<div class="py-4">
<div class="container">
    <form action="/recipe" enctype="multipart/form-data" method="post">

        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Recipe</h1>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Recipe name</label>

                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus>

                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Cooking time</label>

                    <input id="time"
                           type="text"
                           class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}"
                           name="time"
                           value="{{ old('time') }}"
                           autocomplete="time" autofocus>

                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('time') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Servings</label>

                    <input id="servings"
                           type="text"
                           class="form-control{{ $errors->has('servings') ? ' is-invalid' : '' }}"
                           name="servings"
                           value="{{ old('servings') }}"
                           autocomplete="servings" autofocus>

                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('servings') }}</strong>
                        </span>
                    @endif
                </div>


















                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>


                      <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                      </textarea>
                      @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Recipe ingredients</label>

                    <textarea id="ingredient"
                           type="text"
                           class="form-control{{ $errors->has('ingredient') ? ' is-invalid' : '' }} keep_indent"
                           name="ingredient"
                           value="{{ old('ingredient') }}"
                           autocomplete="ingredient" autofocus>
                    </textarea>
                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ingredient') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Recipe instructions</label>

                    <textarea id="instruction"
                           type="text"
                           class="form-control{{ $errors->has('instruction') ? ' is-invalid' : '' }}"
                           name="instruction"
                           value="{{ old('instruction') }}"
                           autocomplete="instruction" autofocus>
                    </textarea>
                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('instruction') }}</strong>
                        </span>
                    @endif
                </div>



                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Recipe Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Recipe</button>
                </div>

            </div>
        </div>
    </form>
</div>
</div>


@endsection
