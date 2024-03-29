<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method("PUT")

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}" alt="{{$user->name}} Avatar">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">

                        @error('name')
                            <span class="d-block fs=6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="image">Profile picture</label>
                <input name="image" id="image" vale="{{ $user->image }}" type="file" class="form-control">
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>

                <textarea value="{{$user->bio}}" name="bio" class="form-control" id="bio" rows="3">
                    {{$user->bio}}
                </textarea>

                @error('bio')
                    <span class="d-block fs=6 text-danger mt-2">{{ $message }}</span>
                @enderror

                <button class="btn btn-dark btn-sm mb-3 mt-2">Save</button>

                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments->count() }} </a>
                </div>

                @auth
                    @if (auth()->id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth
            </div>
        </form>
    </div>
</div>
