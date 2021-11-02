function calcularEdadFamiliar(){
    let dateFirst, dateLast, age;
    dateFirst = $("#fecha_nac_fliar").val().substring(0, 4);
    dateLast = $("#fechaActual").val().substring(0, 4);
    age = dateFirst - dateLast;
    $("#edad_fliar").val(Math.abs(age));
}

$("#parentezco").on('change', function(){
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
            title: 'Desea continuar ?',
            text: "continuar con el registro de informaciòn laboral.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: ' Sí ',
            cancelButtonText: ' No ',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              swalWithBootstrapButtons.fire(
                'Cargando ...',
                'success'
              );
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire(
                'Complete el formulario',
                'Gracias !',
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
                    $(".print-error-msg").find("ul").append('<li>'+value.toString().replace('id persona', 'Número de documento')+'</li>');
            });
        }
    });
});