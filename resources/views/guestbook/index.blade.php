<!-- resources/views/guestbook/index.blade.php -->
@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/guestbook/index.css') }}">
@endsection

@section('content')
    <div class="container">

        <div class="index-container">
            <h2 class="index-title">Comments</h2>
            <div class="index-sort">
                <p>Sort by:
                    <a class="index-sort-title" href="{{ route('guestbook.index', ['column' => 'created_at', 'direction' => $column === 'created_at' && $direction === 'asc' ? 'desc' : 'asc']) }}">Date</a>,
                    <a class="index-sort-title" href="{{ route('guestbook.index', ['column' => 'user_name', 'direction' => $column === 'user_name' && $direction === 'asc' ? 'desc' : 'asc']) }}">Username</a>,
                    <a class="index-sort-title" href="{{ route('guestbook.index', ['column' => 'email', 'direction' => $column === 'email' && $direction === 'asc' ? 'desc' : 'asc']) }}">E-mail</a>

                </p>
            </div>

            <table class="index-table" id="guestbook-table">
                <tbody>
                @foreach($messages as $message)
                    <div class="index-card-message-card">
                        <div class="index-card-body">
                            <div class="index-card-title">
                                <span class="index-card-nickname">{{ $message->user_name }}</span>: {{ $message->text }}
                            </div>
                            <p class="index-card-text">
                                <small class="text-muted">Date: {{ $message->created_at->format('Y-m-d H:i:s') }}</small><br>
                                <small class="text-muted">E-mail: {{ $message->email }}</small>
                            </p>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            {{ $messages->appends(\Request::except('page'))->render() }}
        </div>

    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#guestbook-table th[data-sortable]').on('click', function () {
                const column = $(this).data('sortable');
                const direction = $(this).hasClass('asc') ? 'desc' : 'asc';

                window.location.href = "{{ route('guestbook.index') }}" +
                    "?column=" + column + "&direction=" + direction;
            });
        });
    </script>

@endsection

