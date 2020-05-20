<!-- Modal -->
<div class="modal fade" id="add-unit-modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Unit Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-unit-form"  action="{{ route('admin.product-unit.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputtext">Unit name</label>
                        <input name="unit_name" type="text" class="form-control" placeholder="eg: KG, Liter">
                    </div>
                    <input type="file" name="photo" id="aa">
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="details" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
