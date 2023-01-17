@extends('latihan.layout.main')


@section('jumbotron')

 <h2>{{ $post->title }}</h2>

 {!! $post->body !!} 

@endsection

