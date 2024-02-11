@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            <hr>
            <div class="mt-3">
                @include('shared.user_card')

            </div>
            <div>
                @if (count($ideas) > 0)
                    @foreach ($ideas as $idea)
                        <div class="mt-3">
                            @include('shared.idea_card')
                        </div>
                    @endforeach
                @else
                    No result found.
                @endif

                <div class="mt-3">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
