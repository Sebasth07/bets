

   var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    copyTextareaBtn.addEventListener('click', function(event) {
        event.preventDefault();

    var copyTextarea = document.querySelector('.js-copytextarea');
      copyTextarea.select();

      try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Copying text command was ' + msg);
        Swal.fire({
          position: 'top-end',
          toast:'true',
          icon: 'success',
          title: 'Billetera copiada al portapapeles con existo.',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar:true
        })
      } catch (err) {
        console.log('Oops, unable to copy');
      }
    });

const sendForm = document.querySelector("#send");
      sendForm.addEventListener('submit', function(e){
        e.preventDefault();
        let btn = document.getElementById('btnReg').innerHTML = "Transfiriendo saldo ...";
        let monto = document.querySelector('#monto').value;
        let saldo = document.querySelector('#saldo').value;
        let from = document.querySelector('#from').value;
        let wallet = document.querySelector('#wallet').value;
        let fee = document.querySelector('#fee').value;
        let user = document.querySelector('#user').value;

        if (monto == '' | wallet == '') {
            Swal.fire({
              position: 'top-end',
              toast:'true',
              icon: 'error',
              title: 'Todos los campos son necesarios',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar:true
            });

            let btn = document.getElementById('btnReg').innerHTML = "ENVIAR SALDO";
            return false;

        }else{
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'oficina/transefer';
            var formData = new FormData(sendForm);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if (request.status == 200 && request.readyState == 4){
                    var objData = JSON.parse(request.responseText);
                    if (objData.status){
                        let btn = document.getElementById('btnReg').innerHTML = "ENVIAR SALDO";
                        Swal.fire({
                              position: 'top-end',
                              toast:'true',
                              icon: 'success',
                              title: objData.msg,
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar:true
                        });

                    }
                    else{
                        Swal.fire({
                          icon: 'error',
                          title: 'Atención',
                          text: objData.msg
                          
                        });
                    }
                }
            }
        }
      })



