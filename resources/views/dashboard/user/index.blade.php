@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pt-sm-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">User List</h1>
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

<div class="table-responsive col-lg-10">
    <table class="table table-striped table-lg mb-5">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody >
          @foreach ($users as $user)
          <tr>
            <td class="text-center">{{ $loop->iteration }}.</td>
            <td class="text-capitalize">{{ $user->name }}</td>
            <td class="text-capitalize text-center">{{ $user->email }}</td>
            <td class="text-capitalize text-center"> {{ $user->is_superAdmin ? 'Super Admin' : ($user->is_admin ? 'Second Admin' : 'User') }}</td>
            <td class="text-center">
              <a href="/dashboard/user/{{ $user->id }}/edit" class="badge bg-success"><span data-feather="edit" class="align-text-bottom"></span></a>
              <form action="/dashboard/user/{{ $user->id }}" method="post" onsubmit="return confirmDelete(event)" class="d-inline">
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
            text: 'This account will deleted!',
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