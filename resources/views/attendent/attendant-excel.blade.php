<table class="table table-bordered mt-3">
    <thead>
    <tr>
        
        <th scope="col">student name</th>
        <th scope="col">subject name</th>
        <th scope="col">student year </th>
        <th scope="col">status  </th>
     
    </tr>
    </thead>
    <tbody>
    @foreach($statuses as $statuses)
        <tr>
            
            <td>{{ $statuses->student_name }}</td>
            <td>{{ $statuses->subject_name }}</td>
            <td>{{ $statuses->student_year }}</td>
            <td>{{ $statuses->status }}</td>
         
        </tr>
    @endforeach
    </tbody>
</table>



