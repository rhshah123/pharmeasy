<div class="box-content nopadding">
    <table class="table table-hover table-nomargin">
        <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Requested By</th>
            <th>Date</th>
            <th>Approve</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $req)
            <tr>
                <td>{{$req->user_content->title}}</td>
                <td>{{$req->user_content->type}}</td>
                <td>{{$req->user->name}} ({{ucfirst($req->user->getRole())}})</td>
                <td>{{$req->created_at}}</td>
                <td><button onclick="approveRequest({{$req->id}})">Approve</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    function approveRequest(request_id){
        // alert('Cont : '+content_id+' PaT: '+patient_id+' Usr: '+user_id);
        $.ajax({
            type: "POST",
            url:"{{route('approveRequest')}}",
            headers: {
                'X-CSRF-Token':'{{ csrf_token() }}'
            },
            data: {
                request_id: request_id,
            },
            success: function(resp) {
                alert(resp);
                window.location.reload();
            }
        });
    }
</script>
