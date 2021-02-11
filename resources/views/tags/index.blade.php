@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="active breadcrumb-item">Tags List</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<ul class="list-group">
    @foreach ($tags as $tag)
    <div class='clearfix'>
        <li href="#" class="list-group-item mb-1 pb-4">{{$tag->name}}
            <div class="toolbox float-right">
                <button class="btn btn-danger" onclick="deleteTag({{$tag->id}})">Delete</button>
            </div>
        </li>
    </div>
    @endforeach
</ul>

@endsection