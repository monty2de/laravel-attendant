



@extends('layouts.app')

@section('content')



<div class="container"> 
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"> student name  </th>
        <th scope="col"> subject name  </th>
        <th scope="col"> status </th>

      </tr>
    </thead>
    <tbody>
        @foreach ($statuses as $status )
      <tr>
        <td>   {{ $status->student_name }} </td>
        <td>   {{ $status->subject_name }} </td>
        <td>   {{ $status->status }} </td>
        
      
        
        
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>







@endsection





