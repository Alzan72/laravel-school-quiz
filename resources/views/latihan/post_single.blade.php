@extends('latihan.layout.main')

@section('jumbotron')
 <h2>{{ $post["title"] }}</h2>
 <h5>{{ $post["author"] }}</h5> 
 <p>{{ $post["body"] }}</p>  
@endsection