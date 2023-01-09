@extends('latihan.layout.main')

@section('jumbotron')

@foreach ($posts as $item)

<h2>
    <a href="/post/{{ $item["slug"] }}">{{ $item["title"] }}</a>
</h2>    
<h5>BY: {{ $item["author"] }}</h5>
<p>{{ $item["body"] }}</p>
@endforeach

@endsection