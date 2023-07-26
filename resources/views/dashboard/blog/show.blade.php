@extends('dashboard.layouts.main')

@section('container')

<div class="container mb-4 pt-4 pt-sm-5">
    <div class="row">
        <div class="col-sm-8 mb-2">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="col-sm-8 col-8">
            <div class="pb-2 pb-sm-4">
                <a href="/dashboard/blog" class="btn btn-info me-1 mb-2 mb-sm-0"><span data-feather="arrow-left"></span> Back</a>
            </div>
        </div>
        <div class="col-sm-8">
            @if( $post->image )
            <div style="max-height: 400px; overflow: hidden;" class="rounded my-3">
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