<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </a>
</div>
<div class="modal-body">
    <form action="{{route('admin.category.update', $category->category_id)}}" method="post" id="editCategoryForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputText3" class="col-form-label">Category Name</label>
            <input name="category_name" id="inputText3 cat_name" type="text" class="form-control"
                placeholder="Enter category name" value="{{ $category->category_name }}">
            <span id="error-category_name" class="invalid-feedback"></span>
        </div>

        <div class="div">
            <span class="">Category Photo</span>
            <div class="custom-file mb-3">
                <input name="photo" type="file" class="custom-file-input" id="customFile photo">
                <label class="custom-file-label" for="customFile">Click here to upload photo</label>
                <span id="error-photo" class="invalid-feedback"></span>
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Short Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1 description" rows="3"
                placeholder="Write Short Description"> {{ $category->description }} </textarea>
            <span id="error-description" class="invalid-feedback"></span>
        </div>

        <label class="custom-control custom-checkbox">
            <input name="status" type="checkbox" class="custom-control-input"><span class="custom-control-label">Active
                Status</span>
        </label>

        <button type="submit" class="btn btn-primary" id="ajaxSubmit">Submit</button>
    </form>
</div>
<div class="modal-footer">
    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
</div>
