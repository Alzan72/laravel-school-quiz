<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
       <div class="container">
        <div class="tr">
            <div class="td">
                <form action="/siswa/EditAction/{{ $id->id }}" method="post">
                  {{ csrf_field() }}
                    <div>
                      <input type="hidden" name="id" value="{{ $id->id }}">
                    <label for="">Nama</label>
                    <input type="text" value="{{ $id->Nama }}" name="nama" id="">
                </div>

                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{ $id->email }}">
                </div>

                <div>
                  <label for="">File</label>
                  <input type="file" name="file" value="{{ $id->foto }}">
                  <br>
                  <img src="/Siswa/img/{{ $id->foto }}" width="50px" height="50px" alt="">
                </div>
                <button>Submit</button>
                </form>
            </div>
        </div>
       </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>