



@extends('layouts.app')

@section('content')


<div class="text-center" style="margin-bottom: 20px">
  <h1>Status: {{$message}}</h1>
</div>


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> date  </th>
        <th scope="col"> hours  </th>
        <th scope="col"> delet </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($attenents as $attended )
      <tr>
        <td>   {{ $attended->date }} </td>
        <td>   {{ $attended->hours }} </td>

      <td>
     
          <form action="/attendent/{{$attended->id}}" method="POST">
              {{ csrf_field() }}
                 {{ method_field('DELETE') }}
      
                  <button type="submit" class="btn " style="color: blue">DELET</button>
             </form>
      </td>
        
        
      </tr>
      @endforeach
      
    </tbody>
  </table>









@endsection





