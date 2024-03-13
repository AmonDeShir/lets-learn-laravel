@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include("shared._left-side-bar")
        </div>

        <div class="col-6">
            <div class="mt-3">
                <div class="card">
                    <div class="px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $comment->user->name }}" alt="{{ $comment->user->name }} Avatar">
                                <div>
                                    <h5 class="card-title mb-0">
                                        <a href="#"> {{ $comment->user->name }} </a>
                                    </h5>
                                </div>
                            </div>

                            @if (auth()->id() === $comment->user_id)
                                <div>
                                    <form method="POST" action={{ route('comments.destroy', $comment->id) }}>
                                        <a class="mx-2" href={{ route("comments.edit", $comment->id) }}>Edit</a>
                                        <a href={{ route("comments.show", $comment->id) }}>Show</a>

                                        @csrf
                                        @method('delete')
                                        <button class="ms-1 btn btn-danger btn-sm">X</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($editing ?? false)
                            <form action="{{route('comments.update', $comment->id)}}" method="post">
                                @csrf
                                @method("put")

                                <div class="mb-3">
                                    <textarea name="content" class="form-control" id="content" rows="3">
                                        {{$comment->content}}
                                    </textarea>
                                    @error('content')
                                        <span class="d-block fs=6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-dark mb-2"> Save </button>
                                </div>
                            </form>
                        @else
                            <p class="fs-6 fw-light text-muted">
                                {{ $comment->content }}
                            </p>
                        @endif

                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="fs-6 fw-light text-muted">
                                    <span class="fas fa-clock"></span>
                                    {{$comment->updated_at}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            @include("shared._seach-bar")
            @include("shared._follow-box")
        </div>
    </div>
@endsection
