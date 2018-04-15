<div class="box-content nopadding">
    <table class="table table-hover table-nomargin">
        <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Body</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
            <tr>
                <td>{{$content->title}}</td>
                <td>{{$content->type}}</td>
                <td>{{$content->body}}</td>
                <td>{{$content->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
