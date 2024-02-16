<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>

                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('ideas.destroy', ['idea' => $idea->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @if (Auth::id() == $idea->user->id)
                        <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                        <button class="btn btn-danger btn-sm">X</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="content" rows="3" name="content">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger d-block mt-3"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark mb-2"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
            <div class="d-flex justify-content-between">
                @include('ideas.shared.like_button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @include('ideas.shared.comments_box')
        @endif



    </div>
</div>
