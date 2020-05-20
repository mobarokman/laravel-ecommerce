    <!-- Modal -->
    <div class="modal fade" id="add-assign-permission-modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Assign Permission to {{$role->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-assign-per-form" action="{{ route('admin.postAssignOrRemovePermission', $role->id) }}"
                        method="post">
                        <div class="row">
                            <div class="col-md-6">
                                @csrf
                                <div class="form-group">
                                    <select multiple id="role"
                                        class="form-control @error('permissions') is-invalid @enderror"
                                        name="permissions[]" autofocus>
                                        <option>None</option>
                                        @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Assigned Permission</h5>
                                <p>Check the box of you want to delete any Permission</p>
                                <ul>
                                    @foreach($assignedPermission as $assPer)
                                    <li>
                                        <div class="checkbox mb-1">
                                            <label>
                                                <input name="revoke_per[]" type="checkbox" value="{{$assPer->id}}">
                                                {{$assPer->name}}
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="text-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Assign Permission</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
