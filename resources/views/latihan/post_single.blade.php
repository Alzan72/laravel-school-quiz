@extends('latihan.layout.main')


@section('jumbotron')

 <h2>{{ $post->title }}</h2>

 <p>By: Fulan |<a href="/category/{{ $post->kategori->slug }}">{{ $post->kategori->name }}</a> </p>

 {!! $post->body !!} 

@endsection

