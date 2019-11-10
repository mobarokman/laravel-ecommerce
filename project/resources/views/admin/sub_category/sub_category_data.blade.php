<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Photo</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $num=(($page-1)*$perPage)+1; @endphp
            @foreach($subcategory as $subcat)
            <tr>
            <th scope="row">{{ $num++ }}</th>
                <td>{{$subcat->sub_category_name}}</td>
                <td>{{$subcat->description}}</td>
                <td>{{$subcat->photo}}</td>
                <td>{{$subcat->status}}</td>
                <td> 
                    <!--edit button -->           
                    <a href="{{route('admin.sub-category.edit', $subcat->sub_category_id)}}" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#editCategoryModal" id="editButton"> <i class=" fas fa-edit"></i></a>
    
                    <!-- delete form --> 
                   <form id="deleteForm" style="display: inline;" method="post" action="{{ route('admin.sub-category.destroy', $subcat->sub_category_id) }}">
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
    {{$subcategory->links()}}
    
    
        <!-- ============================================================== -->
        <!-- modal :::edit category Modal  -->
        <!-- ============================================================== -->
        <!-- Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- here data come from 'edit_category.blade.php' page -->                
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- modal  -->
            <!-- ============================================================== -->