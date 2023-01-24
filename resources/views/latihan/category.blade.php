@extends('latihan.layout.main')

@section('jumbotron')
<h1>Category: {{ $category }}</h1>
@foreach ($posts as $item)

<h2>
    <a href="/post/{{ $item->slug }}">{{ $item->title }}</a>
</h2>    
<p>{{ $item->excerpt }}</p>
@endforeach

@endsection