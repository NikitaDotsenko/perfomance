@extends('commonPage')
@section('body')
    @foreach($posts as $post)
        <div style="padding: 0 50px 0 50px">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
@endsection
