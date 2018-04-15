<div class="box-content nopadding">
    <table class="table table-hover table-nomargin">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{$patient->name}}</td>
                <td>{{$patient->email}}</td>
                <td><a href="{{route('home', ['tab'=>'req', 'patient_id'=>$patient->id])}}">View Requests</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
