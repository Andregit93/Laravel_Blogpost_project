@extends('layouts.main')

@section('container')
@if(session()->has('loginSuccess'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            width: '19em',
            heightAuto: true,
            background: 'green',
            color: 'white',
        })
        Toast.fire({
            icon: 'success',
            iconColor: 'white',
            title: '{{ session("loginSuccess") }}'
        })
    });
</script>
@endif
@if(session()->has('logoutSuccess'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            width: '19em',
            heightAuto: true,
            background: 'red',
            color: 'white',
        })
        Toast.fire({
            icon: 'success',
            iconColor: 'white',
            title: '{{ session("logoutSuccess") }}',
        })
    });
</script>
@endif

<div class="row d-flex justify-content-center">
    <div class="col-lg-8 text-center">
        <p class="fs-1 d-sm-block d-none">Welcome to My First Blog Website</p>
        <p class="fs-5 d-block d-sm-none fw-bold">Welcome to My First Blog Website</p>
        <h1 class="text-primary fw-bold">SevtianBlog</h1>
    </div>
</div>
<div class="row d-flex align-items-center justify-content-center my-4">
    <div id="photo-container" class="text-center" style="opacity: 0;">
        <img class="rounded-4" src="img/{{ $image }}" alt="{{ $image }}" width="300px">
    </div>
</div>
    
@endsection