



@extends('layouts.app')

@section('content')

<div class="container">


  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">

  <a class="btn btn-primary" href="/subjects/add" style="  font-size:20px">add courses</a>

    

</div>


    


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> name  </th>
        <th scope="col"> total hours   </th>
        <th scope="col"> edit </th>
        <th scope="col"> delete </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($courses as $subject )
      <tr>
        <td>   {{ $subject->name_en }} </td>
        <td>{{$subject->total_hours}}</td>

        <td>
          <div class="">
              <a href="/subjects/{{$subject->id}}/edit">edit</a>
              
          </div>
      </td>
      <td>
          <form action="/subjects/{{$subject->id}}" method="POST">
              {{ csrf_field() }}
                 {{ method_field('DELETE') }}
      
                  <button type="submit" class="btn " style="color: blue">DELETE</button>
             </form>
      </td>
        
        
      </tr>
      @endforeach
      
    </tbody>
  </table>





</div>






@endsection





