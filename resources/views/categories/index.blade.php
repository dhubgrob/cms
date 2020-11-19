@extends('customlayouts.app')
@section('content')

<div class="d-flex justify-content-end mb-2">

    <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
 @if($categories->count() == 0)

    <p> No Categories... yet! Create one!</p>

    @else
        <table class="table">
            <thead>
                <th>name</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }} </td>
                    <td><a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})" href="#">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post" id="deleteCategoryForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete this category?</p>
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
    
    var form = document.getElementById('deleteCategoryForm')
    form.action = "/categories/"+ id + "/delete"
    $('#deleteModal').modal('show')
}

</script>

@endsection