



@extends('layouts.app')

@section('content')

<div class="container">



  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">


    
  <a class="btn btn-primary" href="/students/add" style=" font-size:20px">add student</a>

</div>



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> name  </th>
      <th scope="col"> year   </th>
      <th scope="col"> edit </th>
      <th scope="col"> delete </th>

    </tr>
  </thead>
  <tbody>
      @foreach ($students as $student )
    <tr>
      <td>  {{ $student->name_ar }}  </td>
      <td>{{$student->level->name}}</td>
      <td>
          <div class="">
              <a href="/students/{{$student->id}}/edit">edit</a>
          
          </div>
      </td>
      <td>
          <form action="/students/{{$student->id}}" method="POST">
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





