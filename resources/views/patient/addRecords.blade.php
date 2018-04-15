<div class="row">
    <div class="col-sm-12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3>
                    <i class="fa fa-th-list"></i>Add Prescription/Medical Record</h3>
            </div>
            <div class="box-content">
                <form action="{{route('postReq')}}" method="POST" class='form-vertical'>
                    {{ csrf_field() }}
                    <input type="hidden" value="add" name="tab">
                    <input type="hidden" value="1" name="formPost">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="title" id="title" placeholder="Text input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type" class="control-label">Type</label>
                        <select name="type" id="type" placeholder="Select Type" class="form-control">
                            <option value="medical">Medical Report</option>
                            <option value="prescription">Prescription Report</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="body" class="control-label">Context</label>
                        <textarea name="body" id="body" rows="5" class="form-control"> </textarea>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
