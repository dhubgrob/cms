@extends('customlayouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">

    <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
</div>

<div class="card card-default">
    <div class="card-header">
       Posts
    </div>
    <div class="card-body">

    @if($posts->count() == 0)

    <p> This folder is empty.</p>

    @else


        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>
                <th></th>
                
            </thead>
            <tbody>

            @foreach($posts as $post)

            <tr>
            <td><img src="{{ asset('storage/'.$post->image) }}" width="60px"></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category_id }}</td>
            @if(empty($post->deleted_at))

            <td>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
            </td>

            <td>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
            Trash
            
            </button>
            </form>
            </td>

            @else

            <td>
            <form action="{{ route('posts.untrash', $post->id) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success btn-sm">
            Untrash
            </button>
            </form>
            </td>

            <td>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
            Delete
            
            </button>
            </form>
            </td>

            @endif

            </tr>
                
            @endforeach

            </tbody>
        </table>
    @endif
    </div>
</div>
@endsection