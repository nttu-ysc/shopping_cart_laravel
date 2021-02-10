@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="active breadcrumb-item">Categories List</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<div class="clearfix mb-3">
    <a href="/categories/create" class="btn btn-primary float-right">Add new category</a>
</div>

<ul class="list-group">
    @foreach ($categories as $category)
    <div class='clearfix'>
        <li href="#" class="list-group-item mb-1 pb-4">{{$category->name}}
            <div class="toolbox float-right">
                <button class="btn btn-secondary">Edit</button>
                <a href="#" class="btn btn-danger">Delete</a>
            </div>
        </li>
    </div>
    @endforeach
</ul>

@endsection