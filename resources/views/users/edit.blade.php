@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <div class="mt-3">
                @include('shared.user-edit-card')
            </div>
            <hr>
            @forelse ($tweets as $tweet)
                <div class="mt-3">
                    @include('shared.tweet-card')
                </div>
            @empty
                <div class="alert alert-info">
                    No tweets found
                </div>
            @endforelse
            <div class="mt-3">
                {{ $tweets->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
