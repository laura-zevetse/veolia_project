function calcularEdadFamiliar(){
    let dateFirst, dateLast, age;
    dateFirst = $("#fecha_nac_fliar").val().substring(0, 4);
    dateLast = $("#fechaActual").val().substring(0, 4);
    age = dateFirst - dateLast;
    $("#edad_fliar").val(Math.abs(age)+' años.');
}

$("#parentezco").on('change', function(){
    let $option = $('<option />', {
        text: $("#nameColaborate").val(),
        value: $("#idColaborate").val()
    });
    $('#id_person_three').prepend($option);
    if ($(this).val() != 4) {
        $(".familia").show();
    } else {
        $(".familia").hide();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: '¿Desea continuar?',
            text: "Continuar con el registro de información laboral.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: ' Sí ',
            cancelButtonText: ' No ',
            reverseButtons: false
          }).then((result) => {
            if (result.isConfirmed) {
              swalWithBootstrapButtons.fire(
                'Cargando...',
                'success'
              );
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire(
                'Complete el formulario',
                'Gracias!',
              );
            }
            if (result.dismiss === Swal.DismissReason.cancel) {
                console.log("haber haber");
              } else {
                enabledTabs("menu3-tab");
                $('#menu3-tab').trigger('click');
              }
        });

    }
});

$("#btnGuardarM2").on('click', function(e){
    e.preventDefault();
    let data = $("#secondForm").serialize();
    $.ajax({
        url: "createFamiliar",
        type:'POST',
        data: data,
        success: function(data) {
            $("#errFormPersona").css({'display':'none'});
            if(data.status){
                Swal.fire({
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                enabledTabs("menu3-tab");
                setTimeout("$('#menu3-tab').trigger('click')", 3500);
            }
        },
        error: function(err){
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            var obj = JSON.parse(err.responseText);
            Object.entries(obj.errors).forEach(([key, value]) => {
                    $(".print-error-msg").find("ul").append('<li>'+value.toString().replace('id persona', 'número de documento')+'</li>');
            });
        }
    });
});

$("#btnGuardarM3").on('click', function(e){
  e.preventDefault();
  let data = $("#formThree").serialize();
  $.ajax({
      url: "createContrato",
      type:'POST',
      data: data,
      success: function(data) {
          $("#errFormContrato").css({'display':'none'});
          if(data.status){
              Swal.fire({
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
              });
          }
          let $option = $('<option />', {
            text: $("#nameColaborate").val(),
            value: $("#idColaborate").val()
          });
          $('#id_persona_file').prepend($option);
          enabledTabs("menu6-tab");
          setTimeout("$('#menu6-tab').trigger('click')", 3500);
      },
      error: function(err){
          console.error("Tenemos Inconvenientes");
          $("#errFormContrato").find("ul").html('');
          $("#errFormContrato").css('display','block');
          var obj = JSON.parse(err.responseText);
          Object.entries(obj.errors).forEach(([key, value]) => {
                  $("#errFormContrato").find("ul").append('<li>'+value.toString().replace('id persona', 'Número de documento')+'</li>');
          });
      }
  });
});


  $("#formArchivo").submit(function(e){
    e.preventDefault();
    let formFile = new FormData(this);
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "createArchivo",
      data: formFile,
      contentType: false,
      processData: false,
      success: (data) => {
        if(data.status){
            Swal.fire({
                icon: 'success',
                title: data.message,
                showConfirmButton: false,
                timer: 1500
            });
        }
      },
      error: function(err){
        console.error(err);
    }
  });
});
