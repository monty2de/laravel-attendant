<table class="table table-bordered mt-3">
    <thead>
    <tr>
        
        <th scope="col">student name</th>
        <th scope="col">subject name</th>
        <th scope="col">subject year </th>
        <th scope="col">hours  </th>
        <th scope="col">date  </th>
    </tr>
    </thead>
    <tbody>
    @foreach($attendants as $attendant)
        <tr>
            
            <td>{{ $attendant->student_name }}</td>
            <td>{{ $attendant->subject_name }}</td>
            <td>{{ $attendant->subject_year }}</td>
            <td>{{ $attendant->hours }}</td>
            <td>{{ $attendant->date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>



