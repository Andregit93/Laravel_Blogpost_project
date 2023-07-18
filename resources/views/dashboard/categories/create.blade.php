@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pt-sm-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
</div>

<div class="col-lg-6 mb-5">
    <form method="post" action="/dashboard/categories">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Category Name</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" value="{{ old('name') }}" autofocus required>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" id="slug" required>
          @error('slug')
           <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>  
        <button type="submit" class="btn btn-primary my-4">Create Category</button>
    </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/categories/createSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

</script>

@endsection
