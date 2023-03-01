@extends('student-quiz.layout-student')

@section('content')
    <div class="container">
        <style>
            ul li{
                margin-bottom: 10px
            }
        </style>

        <div class="row justify-content-center">
            @if(session()->has('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
        @elseif (session()->has('error'))
        <div class="alert alert-danger">
        {{ session()->get('error') }}
         </div>
        @endif 
        
            <div class="col-6">
                <div class="card">
                    <div class="card-header">{{ $exam->name }}</div>
                    <div class="card-body">
                        <ul>
                            <li>Pengajar: {{ $exam->group->user->name }}</li>
                            <li>Dekskripsi: {{ $exam->dekskripsi }}</li>
                            <li>Group: {{ $exam->group->group_name }}</li>
                            <li>Mulai: {{ $exam->start }}</li>
                            <li>Selesai: {{ $exam->end }}</li>
                            <li>Waktu: {{ $exam->time }} Menit</li>
                            <li>Status: {{ $exam->aktif }}</li>
                        </ul>
                        <form action="/token/check" method="POST">
                            @csrf
                        <label for="">Token</label><br>
                        <input type="hidden" name="id" value="{{ $exam->id }}">
                        <input type="text" name="token" class="form-control" placeholder="Masukkan token">
                        <button class="btn btn-primary btn-sm">Mulai</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection