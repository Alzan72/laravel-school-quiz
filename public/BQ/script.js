(function () {
    'use strict'
    const forms = document.querySelectorAll('.requires-validation')
    Array.from(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
    
          form.classList.add('was-validated')
        }, false)
      })
    })()
    

    $(document).ready(() => {
  
      const $showData = $('#tampilan');
      const $raw = $('pre');
    
      $('#surah').on('click', (event) => {
        //  jangan refresh halaman    
        event.preventDefault(); 
    
        $showData.text('Loading the JSON file.');
    
        $.getJSON('https://api.alquran.cloud/v1/surah', (respon) => {
          console.log(respon.code);
          console.log(respon.status);
          const markup = respon.data.map(item => `<li>${item.number}: ${item.name}</li>`).join('');
    
          const list = $('<ul />').html(markup);
    
          $showData.html(list);
    
      JSON.stringify(data, undefined, 2);
        });
      });
      
    });