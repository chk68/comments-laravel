<!-- resources/views/guestbook/create.blade.php -->
@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/guestbook/create.css') }}">
@endsection

@section('content')
    <div class="container">

        <div class="create-container">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form class="create-form" action="{{ route('guestbook.create') }}" method="post">
                @csrf
                <div class="create-card">
                    <label for="user_name" class="create-form-label">Name:</label>
                    <input type="text" class="create-form-control" id="user_name" name="user_name"
                           value="{{ auth()->user()->name }}" required>
                </div>

                <div class="create-card">
                    <label for="email" class="create-form-label">Email:</label>
                    <input type="email" class="create-form-control" id="email" name="email"
                           value="{{ auth()->user()->email }}"
                           required>
                </div>

                <div class="create-card">
                    <label for="text" class="create-form-label">Text:</label>
                    <textarea class="create-form-control" id="text" name="text" required></textarea>
                </div>

                <div class="create-card">
                    <div class="create-form-img">
                        {!! captcha_img() !!}
                    </div>
                    <input type="text" id="captcha" class="create-form-control" name="captcha" required>
                </div>

                <button type="submit" class="btn btn-primary">Add comment</button>
            </form>
        </div>

    </div>
@endsection
