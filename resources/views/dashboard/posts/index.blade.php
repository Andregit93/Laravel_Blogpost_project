@extends('dashboard.layouts.main')

@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pt-sm-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
</div>

@if(session()->has('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session("success") }}',
            showConfirmButton: true,
            confirmButtonColor: '#28a745', // Ubah warna tombol konfirmasi menjadi hijau
        });
    });

</script>
@endif

@if(session()->has('deleteSuccess'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
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

<div class="table-responsive col-sm-10 col-12 mb-3">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="file-plus"
            class="align-text-bottom"></span> Create New Post</a>
    <table class="table table-striped mb-5">
        <thead class="text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td class="text-center">{{ $loop->iteration }}.</td>
                <td>{{ $post->title }}</td>
                <td class="text-center">{{ $post->category->name }}</td>
                <td class="text-center">
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info mb-lg-0 mb-1"><span
                            data-feather="eye" class="align-text-bottom"></span></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-success mb-lg-0 mb-1"><span
                            data-feather="edit" class="align-text-bottom"></span></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline"
                        onsubmit="return confirmDelete(event)">
                        @method('delete')
                        @csrf
                        <button class="badge mb-lg-0 mb-1 bg-danger border-0" type="submit"><span data-feather="trash-2"
                                class="align-text-bottom"></span></button>
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
            text: 'You will not be able to recover this post!',
            showCancelButton: true,
            confirmButtonColor: 'red',
            cancelButtonColor: '#28a745',
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
