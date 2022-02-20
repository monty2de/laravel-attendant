



@extends('layouts.app')

@section('style')
body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: white;
}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
.row.black {
  background: black;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header {
    padding: 0;
    height: 6px;
  }
  .row.header .cell {
    display: none;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}
@endsection

@section('content')



    <div class="d-flex justify-content-center ">
      <a class="text-center btn btn-primary" href="/students/add" style=" font-size:20px">add student</a>

    </div>




  <div class="wrapper">
    <div class="d-flex justify-content-center ">
      <a class="text-center btn btn-primary" href="/students/move/{{2}}" style=" font-size:18px "> move all to next year</a>

    </div>
    <div class="table" style="margin-top:20px">
     
      <div class="row header">
        <div class="cell">
          Name
        </div>
        <div class="cell">
          email
        </div>
        <div class="cell">
          year
        </div>
        <div class="cell">
          edit
        </div>
        <div class="cell">
          delet
        </div>
      </div>
      @foreach ($year1 as $student )
      <div class="row">
        <div class="cell" data-title="Name">
          {{ $student->name }}
        </div>
        <div class="cell" data-title="Age">
          {{ $student->email }}
        </div>
        <div class="cell" data-title="Occupation">
          {{ $student->year }}
        </div>
        <div class="cell" data-title="Location">
          <a style="color: black" href="/students/{{$student->id}}/edit">edit</a>
        </div>

        <div class="cell" data-title="Location">
          <form action="/students/{{$student->id}}" method="POST">
            {{ csrf_field() }}
               {{ method_field('DELETE') }}
    
                <button type="submit" class="btn">DELET</button>
           </form>
        </div>
      </div>
      @endforeach
    
      
   
   
    </div>
    <div class="d-flex justify-content-center ">
      <a class="text-center btn btn-primary" href="/students/move/{{3}}" style=" font-size:18px "> move all to next year</a>

    </div>
    
    <div class="table" style="margin-top:20px">
      
      <div class="row header green">
        <div class="cell">
          Name
        </div>
        <div class="cell">
          email
        </div>
        <div class="cell">
          year
        </div>
        <div class="cell">
          edit
        </div>
        <div class="cell">
          delet
        </div>
      </div>
      
      
      
     
      @foreach ($year2 as $student )
      <div class="row">
        <div class="cell" data-title="Name">
          {{ $student->name }}
        </div>
        <div class="cell" data-title="Age">
          {{ $student->email }}
        </div>
        <div class="cell" data-title="Occupation">
          {{ $student->year }}
        </div>
        <div class="cell" data-title="Location">
          <a style="color: black" href="/students/{{$student->id}}/edit">edit</a>
        </div>

        <div class="cell" data-title="Location">
          <form action="/students/{{$student->id}}" method="POST">
            {{ csrf_field() }}
               {{ method_field('DELETE') }}
    
                <button type="submit" class="btn">DELET</button>
           </form>
        </div>
      </div>
      @endforeach
      
    </div>
    <div class="d-flex justify-content-center ">
      <a class="text-center btn btn-primary" href="/students/move/{{4}}" style=" font-size:18px "> move all to next year</a>

    </div>
    <div class="table" style="margin-top:20px">
      
      <div class="row header blue">
        <div class="cell">
          Name
        </div>
        <div class="cell">
          email
        </div>
        <div class="cell">
          year
        </div>
        <div class="cell">
          edit
        </div>
        <div class="cell">
          delet
        </div>
      </div>
      
  
      @foreach ($year3 as $student )
      <div class="row">
        <div class="cell" data-title="Name">
          {{ $student->name }}
        </div>
        <div class="cell" data-title="Age">
          {{ $student->email }}
        </div>
        <div class="cell" data-title="Occupation">
          {{ $student->year }}
        </div>
        <div class="cell" data-title="Location">
          <a style="color: black" href="/students/{{$student->id}}/edit">edit</a>
        </div>

        <div class="cell" data-title="Location">
          <form action="/students/{{$student->id}}" method="POST">
            {{ csrf_field() }}
               {{ method_field('DELETE') }}
    
                <button type="submit" class="btn">DELET</button>
           </form>
        </div>
      </div>
      @endforeach
      
    </div>


    <div class="table" >
      
      <div class="row header black">
        <div class="cell">
          Name
        </div>
        <div class="cell">
          email
        </div>
        <div class="cell">
          year
        </div>
        <div class="cell">
          edit
        </div>
        <div class="cell">
          delet
        </div>
      </div>
      
   
      @foreach ($year4 as $student )
      <div class="row">
        <div class="cell" data-title="Name">
          {{ $student->name }}
        </div>
        <div class="cell" data-title="Age">
          {{ $student->email }}
        </div>
        <div class="cell" data-title="Occupation">
          {{ $student->year }}
        </div>
        <div class="cell" data-title="Location">
          <a style="color: black" href="/students/{{$student->id}}/edit">edit</a>
        </div>

        <div class="cell" data-title="Location">
          <form action="/students/{{$student->id}}" method="POST">
            {{ csrf_field() }}
               {{ method_field('DELETE') }}
    
                <button type="submit" class="btn">DELET</button>
           </form>
        </div>
      </div>
      @endforeach
      
    </div>
    
  </div>


@endsection





