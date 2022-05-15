



@extends('layouts.app')

@section('content')

<div class="container">


  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">

  <a class="btn btn-primary" href="/povits/add" style="  font-size:20px">assign </a>

    

</div>


    


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> instructor name  </th>
        <th scope="col"> course name   </th>
        <th scope="col"> edit </th>
        <th scope="col"> delete </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($data as $povit )
      <tr>
        <td>   {{ $povit->instructor_name }} </td>
        <td>{{$povit->course_name}}</td>

        <td>
          <div class="">
              <a href="/povits/{{$povit->id}}/edit">edit</a>
              
          </div>
      </td>
      <td>
          <form action="/povits/{{$povit->id}}" method="POST">
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





