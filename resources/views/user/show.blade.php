



@extends('layouts.app')

@section('content')


{{ $user->name }}
{{ $user->type }}



<div class="">
    <a href="/users/{{$user->id}}/edit">edit</a>

</div>


<div class="">
    <form action="/users/{{$user->id}}" method="POST">
        {{ csrf_field() }}
           {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-primary">DELET</button>
       </form>

</div>







@endsection





