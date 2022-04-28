



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit</div>
               
                <div class="card-body">                         
                    <form method="POST" action="/attendent/{{$att->id}}"> 
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">date</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $att->date }}" >

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="hours" class="col-md-4 col-form-label text-md-right">{{ __('hours') }}</label>

                            <div class="col-md-6">
                                <input id="hours" type="text" class="form-control " name="hours" value="{{$att->hours}}" >

                                @error('hours')
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





