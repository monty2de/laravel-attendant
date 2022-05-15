



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('create') }}</div>

                <div class="card-body">
                    <form method="POST" action="/levels/store">
                        @csrf

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">  level </label>
                            <div class="col-md-6">
                            <select name="level" id="level" class="form-control" >
                                @foreach ($levels as $level)
                                    <option value="{{$level}}" >{{$level}}</option>
                                @endforeach
                            </select>      
                        </div>         
                        </div>


                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">  year </label>
                            <div class="col-md-6">
                            <select name="year" id="year" class="form-control" >
                                @foreach ($years as $year)
                                    <option value="{{$year}}" >{{$year}}</option>
                                @endforeach
                            </select>      
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





