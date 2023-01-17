<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    @if(session()->has('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}
    </div>
    @endif





    <a href="/siswa/create">Tambah</a>
        <table>
          
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Foto</td>
                    <td>Aksi</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td> {{ $item->Nama }} </td>
                    <td>{{ $item->email }}</td>
                    <td><img src="/Siswa/img/{{ $item->foto }}" width="50px" height="50px" alt=""></td>
                    <td> <a href="/siswa/edit/{{ $item->id }}">Edit</a></td>
                    {{-- <td> <a href="{{ route('siswa/edit', $item) }}">Edit</a></td> --}}
                    <td> <a href="/siswa/delete/{{ $item->id }}">delete</a></td>
                </tr>
                @endforeach
            </tbody>

        </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>