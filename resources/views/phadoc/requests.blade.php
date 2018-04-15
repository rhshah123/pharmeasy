<div class="box-content nopadding">
    <table class="table table-hover table-nomargin">
        <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
            <tr>
                <td>{{$content['title']}}</td>
                <td>{{$content['type']}}</td>
                <td>{{$content['created_at']}}</td>

                @if($content['status'] == 'Request')
                    <td><button onclick="requestForRecord({{$content['id']}},{{$content['patient_id']}},{{$content['user_id']}})">Request</button></td>
                @elseif($content['status'] == 'Approved')
                    <td><a href="{{route('home', ['tab'=>'rec', 'request_id'=>$content['request_id']])}}">View Record</a></td>
                @else
                    <td>{{$content['status']}}</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    function requestForRecord(content_id, patient_id, user_id){
        // alert('Cont : '+content_id+' PaT: '+patient_id+' Usr: '+user_id);
        $.ajax({
            type: "POST",
            url:"{{route('addRequest')}}",
            headers: {
                'X-CSRF-Token':'{{ csrf_token() }}'
            },
            data: {
                    user_content_id: content_id,
                    patient_id: patient_id,
                    user_id: user_id
                  },
            success: function(resp) {
                alert(resp);
                window.location.reload();
            }
        });
    }
</script>
