@extends('layout.layout')

@section('title','Terms')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">
            <div>
                <h1>Terms</h1>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere consequuntur accusantium hic recusandae et
                inventore perspiciatis, aut blanditiis nobis explicabo harum assumenda autem, veritatis natus reiciendis
                quibusdam, quia id voluptate.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
