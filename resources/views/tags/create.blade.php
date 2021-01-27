@extends('customlayouts.app')
@section('content')

@include('partials.errors')

<div class="card card-default">
    <div class="card-header">
        {{ isset($tag)  ? 'Edit Tag' : 'Create Tag'}}
    </div>
    <div class="card-body">
        <form action="{{  isset($tag)  ? route('tags.update', $tag->id) : route('tags.store') }}" method="post">
            @csrf

            @if(isset($tag))
            @method('PUT')
            @endif

            @if (isset($tag))
            <input type="hidden" name="id" value="{{ $tag->id }}">

            @endif

            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ isset($tag)  ? $tag->name : '' }}">
            </div>
            <div class="form-group">

                <button class="btn btn-success" type="submit">{{ isset($tag)  ? 'Edit Tag' : 'Create Tag'}}</button>
            </div>
        </form>
    </div>
</div>



@endsection
