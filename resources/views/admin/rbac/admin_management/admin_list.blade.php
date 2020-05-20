<div class="card-body">
    <table class="table">
        <thead class=>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminLists as $key => $admin)
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
                    {{$admin->phone}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>