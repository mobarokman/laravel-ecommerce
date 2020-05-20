
  <!-- Modal -->
  <div class="modal fade" id="edit-unit-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit a unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form id="edit-unit-form" action="{{ route('admin.product-unit.update', $unit->unit_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputtext">unit name</label>
                    <input name="unit_name" type="text" class="form-control" id="inputtext" placeholder="eg: tech, food..." value="{{$unit->unit_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">
                        {{$unit->details}}
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        Active
                        </label>
                    </div>
                </div>

                <div class="text-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>