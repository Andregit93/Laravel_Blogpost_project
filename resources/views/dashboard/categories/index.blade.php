@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pt-sm-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
</div>

@if(session()->has('success'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session("success") }}',
      showConfirmButton: true,
      confirmButtonColor: '#28a745', 
    });
  });
</script>
@endif
@if(session()->has('deleteSuccess'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      icon: 'success',
      iconColor: 'red',
      title: 'Success!',
      text: '{{ session("deleteSuccess") }}',
      showConfirmButton: true,
      confirmButtonColor: 'red', 
    });
  });
</script>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><span data-feather="file-plus" class="align-text-bottom"></span> Create New Category</a>
    <table class="table table-striped table-lg mb-5">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($categories as $category)
        <tr>
          <td class="text-center">{{ $loop->iteration }}.</td>
          <td class="text-capitalize">{{ $category->name }}</td>
          <td class="text-center">
            <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-success"><span data-feather="edit" class="align-text-bottom"></span></a>
            <form action="/dashboard/categories/{{ $category->id }}" method="post" onsubmit="return confirmDelete(event)" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" type="submit"><span data-feather="trash-2" class="align-text-bottom"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    function confirmDelete(event) {
      event.preventDefault(); // Menghentikan pengiriman form
      Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: 'You will not be able to recover this category!',
        showCancelButton: true,
        confirmButtonColor: 'red', // Ubah warna tombol konfirmasi menjadi hijau
        cancelButtonColor: '#28a745', // Ubah warna tombol batal menjadi abu-abu
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          event.target.submit(); // Lanjutkan penghapusan
        }
      });
    }
  </script>

@endsection