@extends('layouts.main')

@section('container')

<div class="text-center">
    <h1 class="text-center post-title">{{ $title }}</h1>
</div>

<div class="container my-sm-5 my-4">
    <div class="row justify-content-center">
        @foreach( $categories as $category )
            <div class="col-md-4">
                <div class="card card-2 mb-md-5 mb-4 rounded">
                    <div class="card-body text-center p-3 p-md-5">
                        <h2 class="card-title text-capitalize mb-3 mb-md-4">{{ $category->name }}</h2>
                        <a href="blog?category={{ $category->slug }}" class="btn readMore-btn fw-bold">See Post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
