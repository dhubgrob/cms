@extends('customlayouts.app')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach($errors->all() as $error)
        <li class="list-group-item text-danger">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card card-default">
    <div class="card-header">
        Create Category
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="post">
          @csrf
        <div class="form-group">
         <input type="text" class="form-control" name="name" placeholder="name">
        </div>
          <div class="form-group">
           
            <button class="btn btn-success" type="submit">Create</button>
        </div>
        </form>
    </div>
</div>



@endsection
