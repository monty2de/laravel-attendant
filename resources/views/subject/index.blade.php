



@extends('layouts.app')

@section('content')

<div class="container">


  
<div class="d-flex justify-content-center " style="margin-bottom: 20px">

  <a class="btn btn-primary" href="/subjects/add" style="  font-size:20px">add subjects</a>

    

</div>


    


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> name  </th>
        <th scope="col"> total hours   </th>
        <th scope="col"> year </th>
        <th scope="col"> edit </th>
        <th scope="col"> delet </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject )
      <tr>
        <td><a href=""> {{ $subject->name }}</a></td>
        <td>{{$subject->total_hours}}</td>
        <td>{{$subject->year}}</td>

        <td>
          <div class="">
              <a href="/subjects/{{$subject->id}}/edit">edit</a>
              
          </div>
      </td>
      <td>
          <form action="/subjects/{{$subject->id}}" method="POST">
              {{ csrf_field() }}
                 {{ method_field('DELETE') }}
      
                  <button type="submit" class="btn " style="color: blue">DELET</button>
             </form>
      </td>
        
        
      </tr>
      @endforeach
      
    </tbody>
  </table>





</div>






@endsection





