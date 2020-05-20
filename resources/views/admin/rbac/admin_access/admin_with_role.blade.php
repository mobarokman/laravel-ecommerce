<div class="card-body">
    <table class="table">
        <thead class=>
            <tr>
                <th>#</th>
                <th>Admin Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $key => $admin)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $admin->name }}
                </td>
                <td>
                  {{$admin->email}}
                </td>
                <td>
                    @foreach($admin->roles as $role)
                    {{$role->name}} 
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>