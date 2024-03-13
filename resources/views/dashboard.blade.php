@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include("shared._left-side-bar")
        </div>
        <div class="col-6">
            @include("shared._success-message")
            @include("shared._submit-idea")
            <hr>
            @forelse ($ideas as $idea)
                @include("shared._idea-card")
            @empty
                WOW! Such empty :(
            @endforelse

            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include("shared._seach-bar")
            @include("shared._follow-box")
        </div>
    </div>
@endsection
