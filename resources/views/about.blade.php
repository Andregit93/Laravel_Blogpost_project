@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row align-items-sm-start align-items-lg-center justify-content-sm-center my-4">
        <div class="col-lg-5 order-lg-2 ms-lg-4 col-sm-12 text-center">
            <img id="profile-image" style="opacity: 0;" class="rounded-circle mb-4" src="img/{{ $image }}" alt="{{ $name }}" width="300px">
        </div>        
        <div class="col-lg-5 order-lg-1 text-center text-lg-end">
            <div class="d-sm-flex flex-sm-column align-items-sm-center">
                <div class="d-sm-flex flex-sm-column align-items-sm-center">
                    <h1>I'm <span class="text-primary">{{ $name }}</span><span class="d-block"><span class="text-secondary fs-2" id="typing-text"></span><span class="d-inline text-secondary fs-2">|</span></span></h1>
                </div>                
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-lg-center">
        <div class="col-lg-10 text- text-lg-center">
            <p class="fs-5">You can reach me at <span class="text-primary text-bold">{{ $email }}.</span> I apologize for the inconvenience, because the images on the blog page are still being uploaded manually as I haven't learned about REST API yet. Currently, I am focusing on deepening my understanding of Laravel.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 text-center social-media my-3 pb-5 pb-md-3">
            <p class="fs-5 mb-1">My social media:</p>
            <a href="https://www.instagram.com/sevtiandre" target="blank"><i class="bi bi-instagram mx-3 ig"></i></a>
            <a href="https://github.com/andregit93" target="blank"><i class="bi bi-github mx-3 text-dark"></i></a>
            <a href="https://www.linkedin.com/in/andre-sevtian-2a841622b/" target="blank"><i class="bi bi-linkedin mx-3 text-primary"></i></a>
        </div>
    </div>
</div>





@endsection
