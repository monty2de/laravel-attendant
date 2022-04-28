



@extends('layouts.app')

@section('content')

<div class="container">



  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">


    
  <a class="btn btn-primary" href="/users/add" style=" font-size:20px">add user</a>

</div>



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> name  </th>
      <th scope="col"> email   </th>
      <th scope="col"> edit </th>
      <th scope="col"> delete </th>

    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user )
    <tr>
      <td><a href="/users/{{$user->id}}"> {{ $user->name_ar }}</a></td>
      <td>{{$user->email}}</td>
      <td>
          <div class="">
              <a href="/users/{{$user->id}}/edit">edit</a>
          
          </div>
      </td>
      <td>
          <form action="/users/{{$user->id}}" method="POST">
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





