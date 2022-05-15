



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create subject</div>

                <div class="card-body">
                    <form method="POST" action="/subjects/store">
                        @csrf

                        <div class="form-group row">
                            <label for="name_ar" class="col-md-4 col-form-label text-md-right">Name in arabic
                            </label>

                            <div class="col-md-6">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" required autocomplete="name_ar" autofocus>

                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_en" class="col-md-4 col-form-label text-md-right">Name in english
                            </label>

                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en') }}" required autocomplete="name_en" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">subject code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-md-4 col-form-label text-md-right">subject unit</label>

                            <div class="col-md-6">
                                <input id="unit" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}" required autocomplete="unit" autofocus>

                                @error('unit')
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

                        <div class="form-group row">
                            <label for="semester_id" class="col-md-4 col-form-label text-md-right">  semester </label>
                            <div class="col-md-6">
                            <select name="semester_id" id="semester_id" class="form-control" >
                                @foreach ($semesters as $semester)
                                    <option value="{{$semester->id}}" >{{$semester->name}}</option>
                                @endforeach
                            </select>      
                        </div>         
                        </div>





                        <div class="form-group row">
                            <label for="total_hours" class="col-md-4 col-form-label text-md-right">{{ __('total hours') }}</label>

                            <div class="col-md-6">
                                <input id="total_hours" type="text" class="form-control " name="total_hours" >

                                @error('total_hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

              

      
                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    create
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





