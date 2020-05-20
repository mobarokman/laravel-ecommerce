    <!-- Modal -->
    <div class="modal fade" id="add-permission-modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-permission-form" action="{{ route('admin.permissions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="permission" class="col-md-4 col-form-label text-md-right">
                                Permission Name
                            </label>

                            <input id="permission" type="text"
                                class="form-control @error('permission') is-invalid @enderror" name="permission"
                                value="{{ old('permission') }}">

                            @error('permission')
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
                            <button type="submit" class="btn btn-info">Create Permission</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
