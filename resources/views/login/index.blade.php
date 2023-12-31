@extends('layouts.main')

@section('container')

<div class="row justify-content-center mt-5">
    <div class="col-lg-4 col-11">
        <main class="form-signin w-100 m-auto">
            <h1 class="mb-sm-5 mb-4 text-center fw-normal">Sign in</h1>
            @if(session()->has('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Success!',
                        text: '{{ session("success") }}',
                        showConfirmButton: true,
                        confirmButtonColor: "#28a745",
                    });
                });

            </script>
            @endif
            @if(session()->has('loginError'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed!',
                        text: '{{ session("loginError") }}',
                        showConfirmButton: true,
                        confirmButtonColor: "red",
                    });
                });

            </script>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 my-2 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Don't have an account yet? Sign up from, <a href="/register" class="text-dark">Here.</a></small>
        </main>
    </div>
</div>

@endsection
