
            <div class="card-body">
                {{-- table --}}
                <div class="table-responsive">

                    @if ($units->all())
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        @php $sl=(($page-1)*$perPage)+1; @endphp
                        <tbody>
                            @foreach ($units as $unit)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{$unit->unit_name}}</td>
                                <td>{{$unit->status}}</td>
                                <td>
                                <a id="edit-unit-btn" class="btn btn-warning btn-sm edit-unit-btn" href="{{route('admin.product-unit.edit', $unit->unit_id)}}">Edit</a>

                                <a id="delete-unit-btn" class="btn btn-danger btn-sm delete-unit-btn" href="{{route('admin.product-unit.delete', $unit->unit_id)}}">Delete</a>

                                <a class="btn btn-info btn-sm details-btn" href="{{ route('admin.product-unit.show', $unit->unit_id)}}">Details</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      
                
                    </table>
                    @else
                    <div style="font-size: 30px" class="alert alert-danger text-center text-muted mx-5 p-3">Can not found any unit in Database!</div>
                    @endif
                </div>
                <div>
                    {{$units->links()}}
                </div>
                {{-- table end --}}
            </div>
