



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/subjects/{{$sub->id}}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $sub->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_id" class="col-md-4 col-form-label"> the teacher </label>

                            <select name="teacher_id" id="teacher_id" class="form-control" >
                                @foreach ($teachers as $teacher)

                                    <option value="{{$teacher->id}}" >{{$teacher->name}}</option>

                                @endforeach

                            </select>

                           
                        </div>

                        <div class="form-group row">
                            <label for="total_hours" class="col-md-4 col-form-label text-md-right">{{ __('total_hours') }}</label>

                            <div class="col-md-6">
                                <input id="total_hours" type="text" class="form-control " name="total_hours" value="{{$sub->total_hours}}" >

                                @error('total_hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

              

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" value="{{$sub->year}}" >

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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





