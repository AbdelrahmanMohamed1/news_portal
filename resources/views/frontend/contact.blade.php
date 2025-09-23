@extends('layouts.frontend.app')

@section('body')

<!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
        
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <h1>Contact Us</h1><br>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="{{ route('frontend.contact.send') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input name="name" type="text" class="form-control" placeholder="Your Name" />
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <input name="email" type="email" class="form-control" placeholder="Your Email" />
                                </div>
                                <div class="form-group col-md-4">
                                    <input name="phone" type="number" class="form-control" placeholder="Your phone" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="title" type="text" class="form-control" placeholder="Subject" />
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div>
                                <button class="btn" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p class="mb-4">
                            The contact form is currently inactive. Get a functional and
                            working contact form with Ajax & PHP in a few minutes. Just copy
                            and paste the files, add a little code and you're done.

                        </p>
                        <h4><i class="fa fa-map-marker"></i>{{ $get_settings->street }},{{ $get_settings->city }} ,
                            {{ $get_settings->country }}</h4>
                        <h4><i class="fa fa-envelope"></i>{{ $get_settings->email }}</h4>
                        <h4><i class="fa fa-phone"></i>+{{ $get_settings->phone }}</h4>
                        <div class="social">
                            <a href="{{ $get_settings->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $get_settings->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $get_settings->instagram }}"><i class="fab fa-instagram"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection