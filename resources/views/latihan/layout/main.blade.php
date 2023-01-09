<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} </title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Css bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Css lokal -->
    <link rel="stylesheet" href="BQ/style-html.css">

    <!-- JS bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- css animated -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    

</head>
<body>
    <!-- scroll spy -->
    

      <!-- navbar -->
    <section id="menu" class="sticky-top">
      <nav class="navbar navbar-expand-lg animate__animated animate__bounce  ">
          <div class="container-fluid ">
            <a class="navbar-brand text-white" href="index.html">
              <img src="BQ/gambar/logo2.png" alt="Logo" width="50px" height="50px" class="d-inline-block">Imtaq Shigar Baitul Qur'an</a>
            <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
              <ul class=" nav nav-pills ">
                <li class="nav-item">
                  <a class="nav-link {{ ($title==="Beranda") ? 'text-warning': 'text-white' }}"  href="{{url('/')}}">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ ($title==="Pendaftaran") ? 'text-warning': 'text-white' }}" href="{{url('/pendaftaran')}}">Pendaftaran</a>
                </li>
                
                
                <li class="nav-item">
                  <a class="nav-link {{ ($title==="Kontak") ? 'text-warning': 'text-white' }}" href="{{url('/kontak')}}">Kontak</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="BQ/Quran.html">Al-Quran</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

  </section>
  <!-- Akhir navbar -->

     <!-- Jumbotron -->
    @yield('jumbotron')

    <!-- Akhir jumbotron -->

    

    
    @yield('konten')

    <footer>
      <div class="row bg-success py-3">
          <div class="col text-center">Made With <a href="https://www.instagram.com/ghuroba_72/" class="text-white">@Azzam</a></div>
      </div>
    </footer>

    

    <script>
      AOS.init({
          once: true,
          duration:900   
      });
    </script>
</body>
</html>