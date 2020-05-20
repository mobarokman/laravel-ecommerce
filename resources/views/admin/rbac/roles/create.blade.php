    <!-- Modal -->
    <div class="modal fade" id="add-role-modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-role-form" action="{{ route('admin.roles.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                                name="role" value="{{ old('role') }}" placeholder="eg: Admin or Sales Man">

                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- <div class="form-group">
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                    </div> -->

                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Create Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
