@php
$isCreate = !$category->exists;
$actionUrl = ($isCreate) ? '/categories' : '/categories/'.$category->id;
@endphp

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{$actionUrl}}" enctype="multipart/form-data">
    @csrf
    @if (!$isCreate)
    <input type="hidden" name="_method" value="put">
    @endif
    <div class="form-group">
        <label>category name</label>
        <input class="form-control" name="name" value="{{$category->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
</form>