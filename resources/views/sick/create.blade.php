



@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">sick leave create</div>

                <div class="card-body">
                    <form method="POST" action="/sick/store">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">student name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
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

    <table class="table" style="margin-top: 40px">
        <thead class="thead-dark">
          <tr>
            <th scope="col"> student name  </th>
            <th scope="col"> date   </th>
            <th scope="col"> delet </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($sicks as $item )
          <tr>
            <td>{{$item->student_name}}</td>
            <td>{{$item->date}}</td>
            
            <td>
                <form action="/sick/{{$item->id}}" method="POST">
                    {{ csrf_field() }}
                       {{ method_field('DELETE') }}
            
                        <button type="submit" class="btn" style="color: blue">DELET</button>
                   </form>
            </td>
            
            
          </tr>
          @endforeach
          
        </tbody>
      </table>
</div>

















@endsection





