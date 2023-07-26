@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            @if( $post->image )
            <div class="my-2 rounded" style="max-height: 400px; overflow: hidden;">
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
            </div>
            @endif
            <h1 class="my-2 pt-4 text-capitalize postTitle">{{ $post->title }}</h1>
            <p class="pb-2 pb-sm-3">By : <a href="/blog?author={{ $post->author->username }}" class="text-dark fw-bold text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-dark fw-bold text-decoration-none">{{ $post->category->name }}</a></p>
                {!! $post->body !!}
            <a href="/blog" class="btn fw-bold readMore-btn me-1 my-4 mb-sm-0"><span data-feather="arrow-left"></span> Back to Blog</a>
        </div>
    </div>
</div>

@endsection