<div class="card-body">
    <div class="table-responsive ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Fax</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @php $num=(($page-1)*$perPage)+1; @endphp
                @foreach($suppliers as $supplier)
                <tr>
                    <th scope="row">{{ $num++ }}</th>
                    <td>{{ $supplier->company_name }}</td>
                    <td>{{ $supplier->contact_name }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->fax }}</td>
                    <td>{{ $supplier->description }}</td>
                    <td>
                        <!--edit button -->
                        <a href="{{route('admin.supplier.edit', $supplier->supplier_id)}}"
                            class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#editSupplierModal"
                            id="editButton"> <i class=" fas fa-edit"></i></a>

                        <!-- delete form -->
                        <form id="deleteForm" style="display: inline;" method="post"
                            action="{{route('admin.supplier.destroy', $supplier->supplier_id) }}">
                            @csrf
                            @method('DELETE')
                            <button id="deleteButton" class="btn btn-sm btn-outline-light">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$suppliers->links()}}
    </div>
</div>

<!-- ============================================================== -->
<!-- modal :::edit category Modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- here data come from 'edit_category.blade.php' page -->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- modal  -->
<!-- ============================================================== -->
