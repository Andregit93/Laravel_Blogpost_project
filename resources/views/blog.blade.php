@extends('layouts.main')

@section('container')

<div class="text-center">
    <h1 class="text-center post-title">{{ $title }}</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 col-11">
        <form action="/blog">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group my-md-5 my-4 shadow-sm">
                <input type="text" class="form-control border-3 border-dark" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn border-dark border-3" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if($posts->count())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mb-5 ">
                <div class="card-body text-center p-5">
                    <div style="max-height: 400px; overflow: hidden;">
                        @if( $posts[0]->image )
                            <div class="rounded" style="max-height: 400px; overflow: hidden;">
                                <img style="max-height: 500px;" src="{{ asset('storage/'. $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                            </div>
                        @else
                            <div class="rounded" style="max-height: 400px; overflow: hidden;">
                                <img style="max-height: 500px;" src="https://images.unsplash.com/photo-1590309284223-3946577eb10e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8c3dpc3N8ZW58MHwwfDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                            </div>
                        @endif
                    </div>
                    <h3 class="card-title mt-3"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                    <p class="card-text">
                        <small class="text-muted">By : <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none text-dark fw-bold">{{ $posts[0]->author->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-dark fw-bold">{{ $posts[0]->category->name }}</a> | {{ $posts[0]->created_at->diffForHumans() }}</small>
                    </p>
                    <p class="card-text d-none d-sm-block">{{ $posts[0]->excerpt }}</p>
                    <a href="/post/{{ $posts[0]->slug }}" class="btn fw-bold readMore-btn">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">
        @foreach( $posts->skip(1) as $post )
            <div class="col-lg-6 col-md-6 col-sm-9 col-xl-4">
                <div class="card card-2 mb-5 rounded">
                    <p class="position-absolute py-2 border-4 px-4 rounded category-label"><a href="/blog?category={{ $post->category->slug }}" style="color: black" class="text-decoration-none fw-bolder">{{ $post->category->name }}</a></p>
                    <div class="card-body p-5">
                        @if( $post->image )
                            <div class="rounded" style="max-height: 400px; overflow: hidden;">
                                <img style="max-height: 500px;" src="{{ asset('storage/'. $post->image) }}" class="card-img-top my-3 rounded" alt="{{ $post->category->name }}">
                            </div>
                        @else
                            <div class="rounded" style="max-height: 400px; overflow: hidden;">
                                <img src="https://images.unsplash.com/photo-1590309284223-3946577eb10e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8c3dpc3N8ZW58MHwwfDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60" class="card-img-top my-3 rounded" alt="{{ $post->category->name }}">
                            </div>
                        @endif
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">
                            <small class="text-muted">By : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none text-dark fw-bold">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }}</small>
                        </p>
                        <p class="card-text d-none d-sm-block">{{ $post->excerpt }}</p>
                        <a href="/post/{{ $post->slug }}" class="btn readMore-btn fw-bold">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<button id="scrollUpButton" class="btn btn-light scroll-up-button d-sm-none" title="Scroll Up">
    <i class="bi bi-chevron-double-up"></i>
</button>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="d-flex justify-content-end mb-5">
                <ul class="pagination">
                    {!! $posts->links() !!}
                </ul>
            </div>
        </div>
    </div>
</div>


@else
<h3 class="text-center text-3">Post not found.</h3>
@endif


@endsection
