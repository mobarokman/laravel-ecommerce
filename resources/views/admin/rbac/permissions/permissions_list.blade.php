
                <div class="card-body">
                    <table class="table">
                        <thead class=>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $permission->name }}
                                </td>
                                <td>
                                    @foreach ($permission->roles as $role)
                                    {{ $role->name }} |
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.permissions.edit', $permission->id)}}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>