<div>
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
            alt="Luigi Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">Luigi</h6>

                <div class="d-flex flex-column align-items-end">
                    <small class="fs-6 fw-light text-muted">
                        {{$comment->updated_at}}
                    </small>

                    <a href={{ route("comments.show", $comment->id) }}>Show</a>
                </div>
            </div>

            <p class="fs-6 mt-3 fw-light">
                {{$comment->content}}
            </p>
        </div>
    </div>
</div>
