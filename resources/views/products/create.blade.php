@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="breadcrumb-item"><a href="/products/admin">Products List</a>
            <li class="active breadcrumb-item">Create</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')

    @include('layouts._form');

@endsection