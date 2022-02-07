



@extends('layouts.app')

@section('content')




<button type="button" class="btn btn-primary">
    
    <a href="/users/add" style="color: black; font-size:20px">add user</a>
</button>


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> name  </th>
        <th scope="col"> email   </th>
        <th scope="col"> type </th>
        <th scope="col"> edit </th>
        <th scope="col"> delet </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )
      <tr>
        <td><a href="/users/{{$user->id}}"> {{ $user->name }}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->type}}</td>
        <td>
            <div class="">
                <a href="/users/{{$user->id}}/edit">edit</a>
            
            </div>
        </td>
        <td>
            <form action="/users/{{$user->id}}" method="POST">
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





