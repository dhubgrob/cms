@extends('customlayouts.app')
@section('content')

<div class="d-flex justify-content-end mb-2">

    <a href="{{ route('tags.create') }}" class="btn btn-success">Add tag</a>
</div>

<div class="card card-default">
    <div class="card-header">
        tags
    </div>
    <div class="card-body">
 @if($tags->count() == 0)

    <p> No tags... yet! Create one!</p>

    @else
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts Count</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }} </td>
                    <td>{{ $tag->posts->count() }}</td>
                    <td><a class="btn btn-info btn-sm" href="{{ route('tags.edit', $tag->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})" href="#">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post" id="deletetagForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete this tag?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection

@section('scripts')

<script>

function handleDelete(id) {
    
    var form = document.getElementById('deletetagForm')
    form.action = "/tags/"+ id + "/"
    $('#deleteModal').modal('show')
}

</script>

@endsection