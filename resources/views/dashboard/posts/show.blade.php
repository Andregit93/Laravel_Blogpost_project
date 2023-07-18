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
            <div style="max-height: 400px; overflow: hidden;">
                <img style="max-height: 500px;" src="{{ asset('storage/'. $post->image) }}" class="card-img-top my-3" alt="{{ $post->category->name }}">
            </div>
            @else
            <div style="max-height: 400px; overflow: hidden;">
                <img style="max-height: 500px;" src="https://images.unsplash.com/photo-1590309284223-3946577eb10e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8c3dpc3N8ZW58MHwwfDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60" class="card-img-top my-3" alt="{{ $post->category->name }}">
            </div>
            @endif
            <div class="mt-3">
                {!! $post->body !!}
            </div>
        </div>
    </div>
</div>

@endsection