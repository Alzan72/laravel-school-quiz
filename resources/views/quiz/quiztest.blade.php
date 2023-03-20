<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
        {{-- BS --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      {{-- JS BS --}}
      <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row py-4 bg-primary text-white">
            <div class="col border-2 fs-4">Group: {{ $group }}</div>
            <div class="col text-end">
                <a class="btn btn-danger" href="{{ route('logout') }}"onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">{{ Auth::user()->name }} | Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
    <div class="timer bg-primary text-white fs-5 p-2 mt-2 rounded-pill text-center"></div>
    <div class="card mt-2">
        <div class="card-header">Nomor Soal</div>
        <div class="card-body">
            @php
                $answered = [];
                foreach ($repli_user as $r) {
                    $answered[] = $r->quizzes_id;
                }
            @endphp
            @for ($i = 1; $i <= $total; $i++)
                <button class="move btn btn-sm
                    @if ($id == $i-1)
                       btn-success
                    @elseif (in_array($quiz[$i-1]->id, $answered))
                       btn-primary
                    @else
                        btn-danger
                    @endif
                " value="/quiz/{{ $group }}/{{ $topic }}/start/{{ $i-1 }}">
                    {{ $i }}
                </button>
            @endfor
        </div>
    </div>
</div>

            <div class="col-sm ">
                <div class="card mt-3">
                    <form action="/quiz/reply" class="form-check" id="form" method="post">
                        @csrf
                    <div class="card-header fs-5 ">{{ $id+1 }}. {{ $quiz[$id]->question }}</div>
                    <input type="hidden" name="move" id="move">
                    <input type="hidden" name="exam" id="exam" value="{{ $ex }}">
                    <input type="hidden" name="quest" value="<?=$quiz[$id]->id?>">
                    {{-- <input type="hidden" name="user" value="{{ Auth::user()->id }}"> --}}
                    <div class="card-body ">
                        <input class="answer form-check-input mt-3 " type="radio" name="answer" value="A" {{ (isset($reply) && $reply=='A') ? 'checked':'' }}><label class="form-check-label mt-2 fs-5">{{ $quiz[$id]->answer1 }}</label><br>
                        <input class="answer form-check-input mt-3 " type="radio" name="answer" value="B" {{ (isset($reply) && $reply=='B') ? 'checked':'' }}><label class="form-check-label mt-2 fs-5">{{ $quiz[$id]->answer2 }}</label><br>
                        <input class="answer form-check-input mt-3 " type="radio" name="answer" value="C" {{ (isset($reply) && $reply=='C') ? 'checked':'' }} ><label class="form-check-label mt-2 fs-5">{{ $quiz[$id]->answer3 }}</label><br>
                        <input class="answer form-check-input mt-3 " type="radio" name="answer" value="D" {{ (isset($reply) && $reply=='D') ? 'checked':'' }}><label class="form-check-label mt-2 fs-5">{{ $quiz[$id]->answer4 }}</label>
                        <input type="hidden" id="click" name="click">
                    </div>
                    @if ($id!=0)
                    <button name="move" class="btn btn-primary btn-sm" value="/quiz/{{ $group }}/{{ $topic }}/start/{{ $id-1 }}">< Sebelumnya</button>
                @endif
                @if ($id < $total-1 )
                <button name="move" class="btn btn-primary btn-sm text-end" value="/quiz/{{ $group }}/{{ $topic }}/start/{{ $id+1 }}">Selanjutnya ></button>
                @endif
                @if ($id == $total-1)
                <button value="/student/exam" name="move" class="btn btn-warning btn-sm" id="finish">Selesai</button>
                @endif
                </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // timer
  var savedTime = sessionStorage.getItem('savedTime');

// Jika terdapat nilai waktu yang tersimpan, gunakan nilai tersebut
if (savedTime) {
  var count = savedTime - Math.floor(Date.now() / 1000);
} else {
  // Jika tidak, hitung mundur dari waktu yang ditentukan
  var jam = 2;
  var menit = 0;
  var detik = 0;
  var count = (jam * 3600) + (menit * 60) + detik;
}
// Memulai hitung mundur
var countdown = setInterval(function() {
  // Mengurangi nilai waktu dengan 1 detik
  count--;
  // Menyimpan nilai waktu saat ini ke sessionStorage
  sessionStorage.setItem('savedTime', Math.floor(Date.now() / 1000) + count);
  // Mengupdate elemen HTML dengan nilai waktu yang tersisa
  var hours = Math.floor(count / 3600);
  var minutes = Math.floor((count % 3600) / 60);
  var seconds = count % 60;
  $(".timer").text(hours + " Jam " + minutes + " Menit " + seconds + " Detik");

  // Jika nilai waktu sudah habis, hentikan hitung mundur dan tampilkan pesan
  if (count < 0) {
    clearInterval(countdown);
    alert("Waktu telah habis!");
  }
}, 1000);

  // cek jawaban
  $('.answer').on('click',function(){
    $('#click').val(1)
  })

  // submit
  $('.move').click(function(e){
    e.preventDefault();
    clearInterval(countdown); // menghentikan timer
    $('#move').val($(this).val());
    $('#form').submit();
  })

  // finish
  $('#finish').on('click', function(){
    sessionStorage.removeItem('savedTime');

  })
});
</script>
</body>
</html>
