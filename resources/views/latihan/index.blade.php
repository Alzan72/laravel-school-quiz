
@extends('latihan.layout.main')

    @section('jumbotron')
    <section id="jumbotron">
      <div class="p-5 text-white">
          <div class="container-fluid header-1 " data-aos="fade-right">
            <h1 class="display-5 fw-bold">Ahlan Wa Sahlan</h1>
            <p class="col-md-8 fs-3">Di Imtaq Shigar Baitul Qur'an Wonogiri</p>
            <p class="col-md-8 fs-4">Lembaga pendidikan tahfidz setingkat SMP</p>
            <a href="#profil" class="btn btn-success btn-lg">Tentang kami</a>
          </div>
        </div>
  </section>
    @endsection
    
    <!-- Akhir jumbotron -->

    <!-- Profil -->
    @section('konten')

    <section id="profil">
      <div class="container">
          <div class="row"><h1 class="text-center pb-2 ">Tentang Kami</h1></div>
          <div class="row">
              <div class="col-md-5 text-center" data-aos="fade-right"><img src="BQ/gambar/logo2.png" width="350px" height="auto" alt=""></div>
              <div class="col-md-7" data-aos="fade-left"><div class="row" > <h2>Imtaq Shigor Baitul Qur'an</h2></div>
          <div class="row"><p class="fs-5">Imtaq Shigor Baitul Qur'an adalah lembaga pendidikan Islam setingkat SMP, yang memadukan  antara pendidikan tahfidzul Quran dan dirosah Islamiyah sesuai dengan manhaj Al-Qur'an dan As-Sunnah.</p> 
              <span class="fs-2">Visi</span>
              <p class="fs-5">Menjadi lembaga pendidikan tahfidzul quran yang mampu mencetak generasi muda yang ber akhlak mulia,mandiri,bermanfaat dan berprestasi.</p>
                  <span class="fs-2">Misi</span>
                  <p class="fs-5">1.Mempelajari dan menjaga Al Qur’an yang merupakan satu diantara dua peninggalan Rasulullah SAW yang akan terus abadi hingga akhir zaman <br>
                    2.Mempersiapkan generasi Qur’ani (hafidz 30 juz) yang memiliki pemahaman yang benar terhadap Al Qur’an dan Sunah serta mampu mengimplementasikannya secara kaffah. <br>
                    3.Menyelenggarakan program pendidikan tinggi yang Islami, professional yang berbasis pesantren guna mencetak kader-kader ulama terbaik.</p>
          </div>
      </div>
          </div>
      </div>
  </section>
  <!-- Akhir profil -->

  <!-- Keunggulan -->
  
  <section id="keunggulan">
      <div class="container-fluid bg-hijau ">
          <div class="row "><h1 class="text-center py-3">Keunggulan</h1></div>
          <div class="row fs-5 justify-content-center pb-5">
              <div class="col-10 " data-aos="fade-down">
                <p>
                  1.Hafal Alquran 30 juz <br>
2. Menghafal Matan Matan ilmiah (Tuhfatul Athfal jazariyah dan baiquniyah) <br> 
3.Mendapatkan sanad Matan matan ilmiah (Tuhfatul Athfal dan jazariyah) bagi yang memenuhi syarat <br>
4.Program Itqon (Pengambilan sanad al-quran bagi yang memenuhi syarat) <br>
5.Dibimbing oleh musyrif Al Quran yang bersanad lulusan dalam dan luar negeri <br> 
6.Bahasa Arab aktif dan pasif <br>
7.Kajian kitab kuning<br>
                </p>
              </div>
          </div>
      </div>
  </section>

  
  <!-- keunggulan -->

  <!-- Program -->
  

  <section id="program">
      <div class="container-fluid">
          <div class="row"><h1 class="text-center pb-3">Ekstrakurikuler</h1></div>
          <div class="row justify-content-center">
              <div class="col-sm-4 fs-4" data-aos="flip-left">
                  <ul>
                    <li>Tilawah (MTQ) </li>
                    <li>Beladiri</li>
                    <li>Sapala</li>
                    
                  </ul>
          </div>
          <div class="col-sm-2 fs-4"data-aos="flip-left" >
            <ul>
              <li>Berenang</li>
              <li>Berkuda</li>
              <li>Panahan</li>
            </ul>
          </div>
      </div>
  </section>
  <!-- Akhir program -->



  <!-- Kontak -->
  <section id="kontak">
    <div class="container-fluid py-5 bg-hijau"data-aos="fade-up">
      <div class="row"><center><h1>Alamat</h1></center></div>
      <div class="row justify-content-center">
        <div class="col-md-6 text-center"><p class="fs-5 ">Jl. Cempaka V,Pokoh Rt.01/IV, Kel.Wonoboyo, Kec.Wonogiri, Kab.Wonogiri ,Jawa Tengah, 57615</p>
          <a href="https://goo.gl/maps/3UhHXtwfsjmZTjvu8" target="_blank" class="btn btn-success px-3">Lihat di peta</a>
        </div>
      </div>
    </div>
  </section>

    @endsection
    

