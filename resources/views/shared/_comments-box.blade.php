<div>
    <form method="POST" action="{{route('ideas.comments.store', $idea->id)}}">
        @csrf

        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    @foreach ($idea->comments as $comment)
        @include("shared._comment")
    @endforeach
</div>
