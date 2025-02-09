@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-tweet')
            <hr>
            @foreach ($tweets as $tweet)
                <div class="mt-3">
                    @include('shared.tweet-card')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $tweets->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
