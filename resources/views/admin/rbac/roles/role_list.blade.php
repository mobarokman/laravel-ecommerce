<div class="card-body">
    <table class="table">
        <thead class=>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $role->name }}
                </td>
                <td>
                    <a class="btn btn-info assign-remove-per" href="{{ route('admin.getAssignOrRemovePermission', $role->id) }}">Assign or Remove Permission</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>