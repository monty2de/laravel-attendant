



@extends('layouts.app')

@section('content')


<div class="text-center">
  <h1>{{$message}}</h1>
</div>


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> date  </th>
        <th scope="col"> delet </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($attenents as $attended )
      <tr>
        <td><a href=""> {{ $attended->date }}</a></td>
       

      <td>
       // make the delet
          <form action="/students/{{$attended->id}}" method="POST">
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





