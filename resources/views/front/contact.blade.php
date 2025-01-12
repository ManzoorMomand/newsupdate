@extends('front.layout.app')

@section('main_content')
<div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact US</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="page-content">
            <div class="container">
                <div class="row">
                <div class="col-lg-6 col-md-12">
    <div class="contact-form">
        <form action="{{ route('contact.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="3" id="message" name="message"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary bg-website">Send Message</button>
            </div>
        </form>
    </div>
</div>

                    <div class="col-lg-6 col-md-12">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799198932!2d-74.25987701513004!3d40.69767006272707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1645362221879!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
