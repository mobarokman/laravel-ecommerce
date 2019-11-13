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
    
<br> <br>
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

                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-rocket"></i>Categories

                            <tr> 
                                <th scope="row">number</th>
                                <td>mobarok</td>
                                <td>best</td>
                                <td>and</td>
                                <td>goood</td>               
                            </tr> 
                        </a>  
                      
          

     
    </tbody>
    </table>


    <div id="submenu-5" class="collapse submenu" style="">
            <ul class="nav flex-column">
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.index')}}">Main Category</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a>
                </li>
            </ul>
        </div> 
                  


    
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