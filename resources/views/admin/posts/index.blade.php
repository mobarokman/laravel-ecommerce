@extends('layouts/admin_layout/master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        Post
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}" >
                            {{ __('Create Post') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class=>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->description }}
                                </td>
                                 <td>
                                    
                                 @if(auth('admin')->user()->can('Edit Post'))
                                    <a
                                        class="btn btn-primary"
                                        href="{{ route('admin.posts.edit', $post->id)}}"
                                    >
                                        Edit
                                    </a>
                                    @endif
                                    {{-- @can('Delete Post') --}}
                                    @if(auth('admin')->user()->can('Delete'))
                                    <form
                                        action="{{ route('admin.posts.destroy', $post->id)}}"
                                        method="post"
                                        class="d-inline"
                                    >
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
