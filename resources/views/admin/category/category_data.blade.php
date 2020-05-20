<div class="card-body">
    <div class="table-responsive ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th>Parent</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $num=(($page-1)*$perPage)+1; @endphp
                @foreach($categories as $category)
                @if($category->category_id != 1)

                <tr>
                    <th scope="row">{{ $num++ }}</th>
                    <td>
                        {{$category->category_name}}
                      
                    </td>
                    <td>
                        {{$category->parent->category_name}}
                    </td>
                    <td> {{$category->description}}</td>
                    <td>
                        {{-- <img class="img-thumbnail" style="height:50px; width:50px;"
                            src="{{ Storage::url('category/'.$category->photo) }}" alt="{{ $category->category_name }}"> --}}
                    </td>
                    <td>{{$category->status}}</td>
                    <td>
                        <!--edit button -->
                        <a href="{{route('admin.category.edit', $category->category_id)}}"
                            class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#editCategoryModal"
                          > <i class=" fas fa-edit"></i></a>

                        <!-- delete form -->
                        <form  style="display: inline;" method="post"
                            action="{{ route('admin.category.destroy', $category->category_id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-light">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>


                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}

    </div>
</div>

<!-- ============================================================== -->
<!-- modal :::edit category Modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- here data come from 'edit_category.blade.php' page -->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- modal  -->
<!-- ============================================================== -->
