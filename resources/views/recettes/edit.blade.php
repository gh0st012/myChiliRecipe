
@extends('layouts.app')

@section('content')

<div class="py-4">
<div class="container">
    <form action="/recipe/ {{ $recette->id }} " enctype="multipart/form-data" method="post">

        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Recipe</h1>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Recipe name</label>

                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name')  ?? $recette->name }} "
                           autocomplete="name" autofocus>

                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>


                      <textarea id="description"
                                type="text"
                                class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                autocomplete="description" autofocus>
                        {{ old('description') }}
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
                           value="{{ old('ingredient')  ?? $recette->ingredient }}"
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
                           value="{{ old('instruction')  ?? $recette->instruction }}"
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
                    <button class="btn btn-primary">Edit Recipe</button>
                </div>

            </div>
        </div>
    </form>
</div>
</div>


@endsection
