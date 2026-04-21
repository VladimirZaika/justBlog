@extends('layouts.main')

@section('content')
    <h1>Contact Page</h1>
    <p>Feel free to contact us.</p>

    <form action="{{ route('contact.post') }}" method="POST" id="contactForm" class="contact-form">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Enter subject" value="{{ old('subject') }}">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Your message">{{ old('message') }}</textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>
@endsection