<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('ideas.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            @error('content')
                <span class="fs-6 text-danger d-block mt-3">  {{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>

</div>
