@extends('latihan.layout.main')

  <!-- Jumbotron -->
  @section('jumbotron')
    
  <div class="px-4 py-5 my-5 text-center"  data-aos="flip-up"
  data-aos-easing="linear"
  data-aos-duration="300">
      
      <h1 class="display-5 fw-bold">Kontak</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Hubungi kami jika anda memiliki pertanyaan mengenai Imtaq Shigar Baitul Qur’an</p>
       
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          
        </div>
      </div>
    </div>

  @endsection
  
  <!-- Akhir jumbotron -->

@section('konten')

<section id="kontak">
  <div class="container">
      <div class="row">
          <div class="col"><center><h1>Informasi dan pendaftaran</h1></center></div>
      </div>
      <div class="row text-center">
          <div class="col fs-3">
          <img src="BQ/gambar/whatsapp-png-logo-7.png" width="75px" height="70px" alt=""> 089653732962 <br> Ust.Munir Ramadhan <br> <a class="btn btn-success " target="_blank" href="https://api.whatsapp.com/send/?phone=%+6289653732962&text=Assalamu'alaikum , saya ingin bertanya tentang...?">Hubungi</a></div></div>
      <div class="row py-5">
          <div class="col-md" data-aos="fade-right">
            <div class="kontak">
              <div class="row"><h3>Media Sosial</h3></div>
              <div class="row"><a target="_blank" href="https://www.youtube.com/@baitulquranwonogiri8272" class="nav-link fs-5"><img src="BQ/gambar/youtube-play-red-logo-png-transparent-background-6.png" width="55px" height="50px" alt=""> YouTube: Baitul Quran Wonogiri</a></div>
              <div class="row"><a href="https://www.facebook.com/bqwonogiri" target="_blank" class="nav-link fs-5"><img src="BQ/gambar/icons8-facebook-48.png" width="55px" height="50px" alt=""> Facebook: Baitul Quran Wonogiri</a></div>
              <div class="row"><a href="https://www.instagram.com/baitul_quran_wonogiri" target="_blank" class="nav-link fs-5"><img src="BQ/gambar/icons8-instagram-48.png" width="55px" height="50px" alt=""> Instagram: @baitul_quran_wonogir</a></div>
            </div>
          </div>
          <div class="col-md alamat" data-aos="fade-left">
            <h3 class="">Alamat kami</h3>
            <p class="fs-5">Jl. Cempaka V,Pokoh Rt.01/IV, Kel.Wonoboyo, Kec.Wonogiri, Kab.Wonogiri ,Jawa Tengah, 57615</p>
            <a href="https://goo.gl/maps/3UhHXtwfsjmZTjvu8" target="_blank" class="btn btn-success px-3">Lihat di peta</a>
          
          </div>
        </div>
  </div>

</section>

@endsection
