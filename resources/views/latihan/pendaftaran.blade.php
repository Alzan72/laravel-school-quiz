@extends('latihan.layout.main')
  <!-- Jumbotron -->

  @section('jumbotron')

  <div class="px-4 py-5 my-5 text-center"  data-aos="flip-up"
  data-aos-easing="linear"
  data-aos-duration="300">
      
      <h1 class="display-5 fw-bold">Pendaftaran</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Alhamdulillah, atas izin dan ridho Allah Ta'ala, pada tahun ini Imtaq Shigar Baitul Qur'an telah membuka penerimaan santri baru Tahun ajaran 2023/2024, dengan syarat dan ketentuan sebagai berikut</p>
        <a href="#syarat"class="btn btn-success px-3">Lihat S&K</a>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          
        </div>
      </div>
    </div>

  @endsection
 
  <!-- Akhir jumbotron -->

  <!--Syarat -->

  @section('konten')
    
  <section id="syarat">
    <div class="container-fluid bg-hijau ">
      <div class="row py-3">
        <div class="col"><h1 class="text-center" data-aos="fade-right">Persyaratan</h1></div>
      </div>
      <div class="row px-3">
        <h3 class="text-start">Syarat umum:</h3>
      </div>
      <div class="row px-3" data-aos="fade-up">
        <div class="col fs-4">
            <ol>
                <li>Kuota hanya 30 putra</li>
                <li>Kelas 6 SD/MI Sederajat</li>
                <li>Hafal juz 30/juz amma(Minimal 1 juz)</li>
                <li>Mampu baca tulis Al-Qur'an dengan baik</li>
            </ol>
        </div>
      </div>
      <div class="row px-3">
        <h3 class="text-start">Syarat administrasi:</h3>
      </div>
      <div class="row px-3" data-aos="fade-up">
        <div class="col fs-4">
            <ol>
                <li>Mendaftar melalui WhatsApp: DAFTAR IMTAQ/NAMA</li>
                <li>FC akta kelahiran 2 lembar</li>
                <li>FC ijazah SD/MI 2 lembar(bisa menyusul)</li>
                <li>FC KK & KTP Ortu 2 lembar</li>
                <li>Pas foto warna terbaru: 2x3, 3x4, BG biru 3 lembar</li>
                <li>Membayar biaya pendaftaran sebesar Rp.200.000 ke rekening: BSI 7212639081 a.n PSB BAITUL QUR'AN</li>
            </ol>
        </div>
      </div>
    </div>
   </section>
  
      <!-- Syarat -->

      <!-- Jalur -->

   
      <section id="jalur">
        <div class="container-fluid bg-light">
          <div class="row py-3">
            <div class="col"><h1 class="text-center" data-aos="fade-right">Jalur Pendaftaran</h1></div>
          </div>
          <div class="row px-3">
            <div class="row justify-content-center">
                <div class="col-md-3 py-2 text-center garis" data-aos="zoom-in-right" data-aos-duration="1000" style=""><h3 class="py-5">Reguler</h3>
                </div>
                <div class="col-md-3 py-2 text-center garis" data-aos="zoom-in-right" data-aos-duration="1000" style=""><h3>Beasiswa prestasi tahfidz (Potongan 50% daftar ulang)</h3>
                  <p>-Hafal Al-Qur'an 10 Juz</p>
                </div>
                <div class="col-md-3 py-2 text-center garis" data-aos="zoom-in-right" data-aos-duration="1000" style=""><h3>Beasiswa prestasi (Potongan 50% daftar ulang)</h3>
                  <p>-Pernah menjuarai lomba tahfidz (Min.5 juz)</p>
                  <p>-Pernah menjuarai lomba sains,matamtika,dll (menyerahkan sertifikat juara)</p>
                </div>
                <div class="col-md-3 py-2 text-center" data-aos="zoom-in-left" data-aos-duration="1000"><h3>Beasiswa Yatim & Dhuafa (Potongan 50% daftar ulang & Syahriyah) dengan membawa surat keterangan tidak mampu</h3>
          </div>
            </div>
          </div>
        </div>
       </section>
     

      <!-- Akhir jalur -->

      <!-- Biaya -->

      <section id="biaya">
        <div class="container-fluid bg-light">
          <div class="row py-3 bg-hijau">
            <div class="col"><h1 class="text-center" data-aos="fade-right">Rincian biaya</h1></div>
          </div>
          <div class="row " data-aos="fade-up">
            <table class="table">
                <thead>
                  <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Rincian</th>
                    <th scope="col">Biaya</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-success">
                    <th scope="row">1</th>
                    <td>Syahriyah bulan Juli 2023</td>
                    <td>700.000</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Buku pegangan 1 tahun (6 Kitab)</td>
                    <td>600.000</td>
                    
                  </tr>
                  <tr class="table-success">
                    <th scope="row">3</th>
                    <td >Kegiatan</td>
                    <td>800.000</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td >Sarpras</td>
                    <td>700.000</td>
                  </tr>
                  <tr class="table-success">
                    <th scope="row">5</th>
                    <td >Infaq pengembangan (bisa diangsur 4x)</td>
                    <td>2.000.000</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td >Seragam 4 stel</td>
                    <td>900.000</td>
                  </tr>
                  <tr class="table-success">
                    <th scope="row">7</th>
                    <td >Kesehatan</td>
                    <td>300.000</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td >Perpustakaan</td>
                    <td>200.000</td>
                  </tr>
                  <tr class="table-success">
                    <th scope="row" colspan="2" class="text-center">Total</th>
                    <td>6.200.000</td>
                  </tr>
                </tbody>
              </table>
        </div>
       </section>

      <!-- biaya -->

      <!-- materi -->
      <section id="materi">
        <div class="container-fluid ">
          <div class="row py-3 ">
            <div class="col"><h1 class="text-center " data-aos="fade-right">Materi Tes</h1></div>
          </div>
          <div class="row px-3">
            <div class="col fs-4" data-aos="fade-up"><ol>
                <li>Hafalan Qur'an yang dimiliki</li>
                <li>Speed test Qur'an (menghafal cepat)</li>
               <li>Tes tulis</li>
               <li>Wawancara</li>
            </ol>
        <h3>Waktu Tes :</h3>
        <ul>
            <li>Online:Senin,Selasa,Rabu.</li>
            <li>Offline: Kamis,Jum'at,Sabtu.</li>
        </ul>
        </div>
          </div>
        </div>
       </section>
       <!-- materi -->

      <!-- waktu -->
      <section id="waktu">
        <div class="container-fluid bg-hijau py-5 ">
          <div class="row py-3 ">
            <div class="col"><h1 class="text-center" data-aos="fade-right">Waktu Pendaftaran</h1></div>
          </div>
          <div class="row ">
            <div class="col text-center" data-aos="fade-up"><h3 class="">Buka Mulai 1 November s.d kuota terpenuhi</h3>
                <a href="pendaftaran.php" target="_blank" class="btn btn-success px-3">Daftar Disini</a>
            </div>
            
          </div>
        </div>
       </section>
      <!-- waktu -->

  @endsection
   

      