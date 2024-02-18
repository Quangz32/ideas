<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top users</h5>
    </div>
    <div class="card-body">
        @forelse ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route('users.show', $user->id) }}">
                        <img style="width: 50px" class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}"
                            alt="{{ $user->email }}">
                    </a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                </div>
                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                    href="{{ route('users.show', $user->id) }}"><i class="fa-solid fa-plus"> </i>
                </a>
            </div>
        @empty
            There are noone here...
        @endforelse



        <div class="d-grid mt-3">
            <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
        </div>
    </div>
</div>
