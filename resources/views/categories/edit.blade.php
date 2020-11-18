@extends('customlayouts.app')
@section('content')
<h1>Edit Category</h1>
@if($errors->any())
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="./update" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $category->id }}">
    <input type="text" name="name" placeholder="name" value="{{ $category->name }}">
    <button type="submit">Edit</button>
</form>
@endsection