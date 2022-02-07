



@extends('layouts.app')

@section('content')



<button type="button" class="btn btn-primary">
    
    <a href="/students/add" style="color: black; font-size:20px">add student</a>
</button>


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> name  </th>
        <th scope="col"> email   </th>
        <th scope="col"> year </th>
        <th scope="col"> edit </th>
        <th scope="col"> delet </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student )
      <tr>
        <td><a href=""> {{ $student->name }}</a></td>
        <td>{{$student->email}}</td>
        <td>{{$student->year}}</td>

        <td>
          <div class="">
              <a href="/students/{{$student->id}}/edit">edit</a>
          
          </div>
      </td>
      <td>
          <form action="/students/{{$student->id}}" method="POST">
              {{ csrf_field() }}
                 {{ method_field('DELETE') }}
      
                  <button type="submit" class="btn btn-primary">DELET</button>
             </form>
      </td>
        
        
      </tr>
      @endforeach
      
    </tbody>
  </table>









@endsection





