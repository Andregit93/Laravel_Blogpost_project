@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            @if( $post->image )
            <div class="my-3 rounded" style="max-height: 400px; overflow: hidden;">
                <img style="max-height: 500px;" src="{{ asset('storage/'. $post->image) }}" class="card-img-top rounded" alt="{{ $post->category->name }}">
            </div>
            @else
            <div class="my-4 rounded" style="max-height: 400px; overflow: hidden;">
                <img style="max-height: 500px;" src="https://images.unsplash.com/photo-1590309284223-3946577eb10e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8c3dpc3N8ZW58MHwwfDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60" class="card-img-top rounded" alt="{{ $post->category->name }}">
            </div>
            @endif
            <h1 class="mb-2">{{ $post->title }}</h1>
            <p class="pb-3">By : <a href="/blog?author={{ $post->author->username }}" class="text-dark fw-bold text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a></p>
            {!! $post->body !!}
            <a href="/blog" class="btn fw-bold readMore-btn me-1 my-3 mb-sm-0"><span data-feather="arrow-left"></span> Back to Blog</a>
        </div>
    </div>
</div>

@endsection