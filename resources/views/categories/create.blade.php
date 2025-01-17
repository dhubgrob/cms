@extends('customlayouts.app')
@section('content')

@include('partials.errors')

<div class="card card-default">
    <div class="card-header">
        {{ isset($category)  ? 'Edit Category' : 'Create Category'}}
    </div>
    <div class="card-body">
        <form action="{{  isset($category)  ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
            @csrf

            @if (isset($category))
            <input type="hidden" name="id" value="{{ $category->id }}">

            @endif

            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ isset($category)  ? $category->name : '' }}">
            </div>
            <div class="form-group">

                <button class="btn btn-success" type="submit">{{ isset($category)  ? 'Edit' : 'Create'}}</button>
            </div>
        </form>
    </div>
</div>



@endsection
