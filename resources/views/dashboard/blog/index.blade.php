@extends('dashboard.layouts.main')

@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pt-sm-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Management</h1>
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

<div class="table-responsive col-sm-10 col-12 mb-2">
    <table class="table table-striped mb-5">
        <thead class="text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- nomor pada table --}}
            @php
                $currentPage = $posts->currentPage();
                $perPage = $posts->perPage();
                $offset = ($currentPage - 1) * $perPage + 1;
            @endphp
            @foreach ($posts as $post)
            <tr class="text-center">
                <td>{{ $offset + $loop->index }}.</td>
                <td class="text-capitalize">{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->author->name }}</td>
                <td>
                    <a href="/dashboard/blog/{{ $post->slug }}" class="badge bg-info mb-lg-0 mb-1"><span
                            data-feather="eye" class="align-text-bottom"></span></a>
                    <a href="/dashboard/blog/{{ $post->slug }}/edit" class="badge bg-success mb-lg-0 mb-1"><span
                            data-feather="edit" class="align-text-bottom"></span></a>
                    <form action="/dashboard/blog/{{ $post->slug }}" method="post" class="d-inline"
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="d-flex justify-content-end mb-5">
                <ul>
                    {!! $posts->links() !!}
                </ul>
            </div>
        </div>
    </div>
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
