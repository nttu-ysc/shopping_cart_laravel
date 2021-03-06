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
            <span class="badge badge-primary badge-pill">{{$category->products_count}}</span>
            <div class="toolbox float-right">
                <a href="/categories/{{$category->id}}/edit" class="btn btn-secondary">Edit</a>
                <button class="btn btn-danger" onclick="deleteCategory({{$category->id}})">Delete</button>
            </div>
        </li>
    </div>
    @endforeach
</ul>

@endsection