@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include("shared._left-side-bar")
        </div>
        <div class="col-6">
            @include("shared._success-message")
            <div class="mt-3">
                @include('shared._user-edit-card')
            </div>
            <hr>
        </div>

        <div class="col-3">
            @include("shared._seach-bar")
            @include("shared._follow-box")
        </div>
    </div>
@endsection
