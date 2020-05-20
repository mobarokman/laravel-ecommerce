<div class="card-body">
    <div class="table-responsive ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $num=(($page-1)*$perPage)+1; @endphp
                @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $num++ }}</th>
                    <td>{{ $tag->tag_name }}</td>
                    <td>
                        <!--edit button -->
                        <a href="{{route('admin.tag.edit', $tag->tag_id)}}" class="edit-button btn btn-sm btn-info"
                            data-toggle="modal" data-target="#editTagModal" id="editButton"> <i
                                class=" fas fa-edit"></i> Edit</a>
                        <!-- delete form -->
                        <form id="deleteForm" style="display: inline;" method="post"
                            action="{{route('admin.tag.destroy', $tag->tag_id) }}">
                            @csrf
                            @method('DELETE')
                            <button id="deleteButton" class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$tags->links()}}
    </div>
</div>

<!-- ============================================================== -->
<!-- modal :::edit category Modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
