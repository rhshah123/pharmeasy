<div class="row">
    <div class="col-sm-12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3>
                    {{ucwords($contents->type)}} Record of <b>{{$contents->user->name}}</b> (Date : {{$contents->created_at->format('D, j M Y h:i A')}})
                </h3>
            </div>
            <div class="box-content">
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" class="form-control" disabled="" value="{{$contents->title}}">
                </div>
                <div class="form-group">
                    <label for="body" class="control-label">Body</label>
                    <textarea rows="15" class="form-control" disabled>{{$contents->body}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
