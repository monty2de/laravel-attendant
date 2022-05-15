



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="/students/{{$st->id}}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name_ar" class="col-md-4 col-form-label text-md-right">{{ __('Name in arabic
                                ') }}</label>

                            <div class="col-md-6">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{$st->name_ar    }}" required autocomplete="name_ar" autofocus>

                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_en" class="col-md-4 col-form-label text-md-right">{{ __('Name in English
                                ') }}</label>

                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{$st->name_en    }}" required autocomplete="name_en" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level_id" class="col-md-4 col-form-label text-md-right">  year </label>
                            <div class="col-md-6">
                            <select name="level_id" id="level_id" class="form-control" >
                                @foreach ($levels as $level)
                                    <option value="{{$level->id}}" >{{$level->level}} - {{$level->year}}</option>
                                @endforeach
                            </select>      
                        </div>         
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    UPDATE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

















@endsection





