<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="{{ $user->name }}">
                    <div>
                        @if ($editing ?? false)
                            <input name="name" type="text" value="{{ $user->name }}" class="form-control">
                            @error('name')
                                <span class="fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        @else
                            <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                                </a></h3>
                            <span class="fs-6 text-muted">{{ $user->email }}</span>
                        @endif

                    </div>
                </div>
                <div>
                    @auth()
                        @if ($user->id == Auth::id())
                            <div>
                                <a href="{{ route('users.show', $user->id) }}">View</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="">Profile picture</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea class="form-control" name="bio" id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark btn-sm mb-2">Save</button>
                @include('users.shared.user_stats')

            </div>
        </form>

    </div>
</div>
<hr>
