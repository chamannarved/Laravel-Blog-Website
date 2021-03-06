@extends('layouts.app')

@section('content')
<div class="container">
    <span class="mt-3 pl-2">
        <h3><b>Featured Post</b></h3>
    </span>
    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <span class="mt-5 pl-2">
        <h3><b>Latest Posts</b></h3>
    </span>
    <div class="row">
        @foreach($blog['posts'] as $post)
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url($post['slug'])}}">{{ $post['title'] }}</a></h5>
                    <p class="card-text"><small class="text-muted">{{($post['updated_at'])}}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
