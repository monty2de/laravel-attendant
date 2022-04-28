



@extends('layouts.app')

@section('content')

<div class="container">


  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">

  <a class="btn btn-primary" href="/semesters/add" style="  font-size:20px">add semesters</a>
                
    

</div>


    


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> name  </th>
        <th scope="col"> year  </th>
        <th scope="col"> edit </th>
        <th scope="col"> delete </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($semesters as $semester )
      <tr>
        <td>   {{ $semester->name }} </td>
        <td>   {{ $semester->year }} </td>
      

        <td>
          <div class="">
              <a href="/semesters/{{$semester->id}}/edit">edit</a>
              
          </div>
      </td>
      <td>
          <form action="/semesters/{{$semester->id}}" method="POST">
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





