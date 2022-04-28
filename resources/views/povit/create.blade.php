



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">assign instructor to course</div>

                <div class="card-body">
                    <form method="POST" action="/povits/store">
                        @csrf

                    

                        <div class="form-group row">
                            <label for="instructor_id" class="col-md-4 col-form-label text-md-right">  instructor name </label>
                            <div class="col-md-6">
                            <select name="instructor_id" id="instructor_id" class="form-control" >
                                @foreach ($instructors as $teacher)
                                    <option value="{{$teacher->id}}" >{{$teacher->name_ar}}</option>
                                @endforeach
                            </select>      
                        </div>         
                        </div>

                        <div class="form-group row">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">  course name </label>
                            <div class="col-md-6">
                            <select name="course_id" id="course_id" class="form-control" >
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}" >{{$course->name_ar}}</option>
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





