<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </a>
</div>
<div class="modal-body">
    <form action="{{route('admin.tag.update', $tag->tag_id)}}" method="post" id="editTagForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputText3" class="col-form-label">Tag Name</label>
            <input name="tag_name" id="inputText3 cat_name" type="text" class="form-control"
                placeholder="Enter tag name" value="{{ $tag->tag_name }}">
            <span id="error-tag_name" class="invalid-feedback"></span>
        </div>

        <button type="submit" class="btn btn-primary" id="ajaxSubmit">Submit</button>
    </form>
</div>
<div class="modal-footer">
    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
</div>
