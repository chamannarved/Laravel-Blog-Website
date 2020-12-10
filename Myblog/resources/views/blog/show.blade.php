@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if($blog['post']['featured_image'])
            <img src="{{ url($blog['post']['featured_image']) }}" alt="{{ $blog['post']['featured_image_caption'] }}" />
            @endif
            <h1><b>{{ $blog['post']['title'] }}</b></h1>
            <br><br>
            <div class="col-sm-8">
                {!! $blog['post']['body'] !!}
            </div>
        </div>
    </div>
</div>
@endsection
