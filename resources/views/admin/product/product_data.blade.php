<div class="card-body">
    <div class="table-responsive ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $num=(($page-1)*$perPage)+1; @endphp
                @foreach($products as $product)

                <tr>
                    <th scope="row">{{ $num++ }}</th>
                    <td>
                        {{$product->product_name}}
                    <td> {{$product->sub_category_name}}</td>
                    <td>{{$product->price}}</td>

                    <td>{{$product->status}}</td>
                    <td>
                        <!--edit button -->
                        <a href="{{route('admin.product.edit', $product->product_id)}}"
                            class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#editproductModal"
                            id="editButton"> <i class=" fas fa-edit"></i></a>

                        <!-- delete form -->
                        <form id="deleteForm" style="display: inline;" method="post"
                            action="{{ route('admin.product.destroy', $product->product_id) }}">
                            @csrf
                            @method('DELETE')
                            <button id="deleteButton" class="btn btn-sm btn-outline-light">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>

                        <a href="{{route('admin.product.show', $product->product_id)}}">View</a>
                    </td>


                </tr>


                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
</div>


<!-- ============================================================== -->
<!-- modal :::edit product Modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="editproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- here data come from 'edit_product.blade.php' page -->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- modal  -->
<!-- ============================================================== -->
