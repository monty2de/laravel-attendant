



@extends('layouts.app')

@section('content')

<div class="container">


  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">

  <a class="btn btn-primary" href="/levels/add" style="  font-size:20px">add levels</a>
                
    

</div>


    


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> name  </th>
        <th scope="col"> edit </th>
        <th scope="col"> delete </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($levels as $level )
      <tr>
        <td>   {{ $level->level }}  - {{ $level->year }}</td>
      

        <td>
          <div class="">
              <a href="/levels/{{$level->id}}/edit">edit</a>
              
          </div>
      </td>
      <td>
          <form action="/levels/{{$level->id}}" method="POST">
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





