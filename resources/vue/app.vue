<template>
<!-- Modal -->
<div class="modal fade modalKu" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center">Mengirim data....</h1>
        <span id="close" data-bs-dismiss="modal" hidden></span>
      </div>
      <div class="modal-body ">
        <div class="dot-spinner">
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
</div>
<h4 class="text-center mt-5"> Terima kasih atas penilaian anda</h4>
</div>
      </div>
    </div>
  </div>


    <div class="container py-4 postion-relative">
        <div class="row justify-content-between">
            <div class="col-5 text-center">
        <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
          <span class="fs-4">RSUD Dr Moewardi Surakarta</span>
        </a>
    </header>
    </div>
    <div class="col-5 text-center">
        <div id="waktu" class="fs-4"></div>
    </div>
    </div>
      <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Survei Kepuasan Pengunjung</h1>
        </div>
      </div>
      <div class="row align-items-md-stretch">
        <div class="col-md-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
          <div class="h-100 p-5 text-white bg-dark rounded-3 text-center"  @click="survey(2)">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-emoji-laughing-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5c0 .501-.164.396-.415.235C6.42 6.629 6.218 6.5 6 6.5c-.218 0-.42.13-.585.235C5.164 6.896 5 7 5 6.5 5 5.672 5.448 5 6 5s1 .672 1 1.5zm5.331 3a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zm-1.746-2.765C10.42 6.629 10.218 6.5 10 6.5c-.218 0-.42.13-.585.235C9.164 6.896 9 7 9 6.5c0-.828.448-1.5 1-1.5s1 .672 1 1.5c0 .501-.164.396-.415.235z"/>
</svg>
            <h2>Sangat Puas</h2>
          </div>
        </div>
        <div class="col-md-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <div class="h-100 p-5 text-white bg-dark rounded-3 text-center"  @click="survey(1)">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
</svg>
            <h2>Puas</h2>
          </div>
        </div>
        <div class="col-md-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <div class="h-100 p-5 text-white bg-dark rounded-3 text-center"  @click="survey(0)">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-emoji-frown-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm-2.715 5.933a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 0 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
</svg>
            <h2>Tidak Puas</h2>
          </div>
        </div>

      </div>
    </div>
  </template>

  <script>

      import axios from 'axios';

      export default {

          methods: {
              survey(value) {
                  console.log(`Hello ${value}!`);
                  var body = {
                      value: value,
                      // field_name: field_value,
                      // field_name: field_value,
                      // field_name: field_value,
                      // field_name: field_value,
                  };
                  axios({
                      method: 'post',
                      url: '/surveys',
                      data: body
                  })
                  .then(function (response) {
                      console.log(response);
                      var notif=document.getElementById('close');
                      if(notif){
                      setTimeout(function() {
          notif.click();
        }, 3000);
                      }
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
              }
          }
      }

       function updateWaktu() {
        var now = new Date();
        var jam = now.getHours();
        var menit = now.getMinutes();
        var detik = now.getSeconds();
        var waktu = jam + ":" + menit + ":" + detik;
        document.getElementById("waktu").innerHTML = waktu;
      }
      setInterval(updateWaktu,1000)
  </script>
