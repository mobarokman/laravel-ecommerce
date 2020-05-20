<!-- Modal -->
<div class="modal fade" id="delete-unit-modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body my-3">
                <form id="delete-unit-form" action="{{ route('admin.product-unit.destroy', $unit->unit_id) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <h5 class="modal-title text-center" id="">Do you want do Delete this?</h5>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-info">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
