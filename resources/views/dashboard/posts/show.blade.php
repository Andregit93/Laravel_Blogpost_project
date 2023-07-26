@extends('dashboard.layouts.main')

@section('container')

<div class="container mb-4 pt-4 pt-sm-5">
    <div class="row">
        <div class="col-sm-8 mb-2">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="col-sm-8 col-8">
            <div class="pb-2 pb-sm-4">
                <a href="/dashboard/posts" class="btn btn-info me-1 mb-2 mb-sm-0"><span data-feather="arrow-left"></span> Back to my post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-success me-1"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                      <button class="btn btn-danger" type="submit" onclick="confirm('Are you sure?')"><span data-feather="trash-2"></span> Delete</button>
                  </form>
            </div>
        </div>
        <div class="col-sm-8">
            @if( $post->image )
            <div class="my-3 rounded" style="max-height: 400px; overflow: hidden;">
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}">
            </div>
            @endif
            <div class="mt-3">
                {!! $post->body !!}
            </div>
        </div>
    </div>
</div>

@endsection