$(document).ready(function(e) {
    $("#menu2-tab").addClass('disabled');
    $("#menu3-tab").addClass('disabled');
    $("#menu4-tab").addClass('disabled');
    $("#menu5-tab").addClass('disabled');
    $("#menu6-tab").addClass('disabled');
    $(".familia").hide();
    $("#ciudad_resid").select2();
    $("#ciudad_exp").select2();
    $("#tipo_sangre").select2();
    $("#educacion").select2();
    $("#estado_colab").select2();
    $("#sexo").select2();
    $("#tipo_contrato").select2();
    $("#cargo").select2();
    $("#area").select2();
    $("#gerencia").select2();
    $("#sede").select2();
    $("#unidad_negocio").select2();
    $("#estrategico").select2();
    $("#centro_costo").select2();
    $("#tipo_dotacion").select2();


    $('#upload-image-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('#image-input-error').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url: `createPerson`,
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#errFormPersona").css({'display':'none'});
                if(data.status){
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    let namePersona = data.info.original.data.nombre+' '+data.info.original.data.primer_apellido;
                    $("#nameColaborate").val(namePersona);
                    $("#idColaborate").val(data.info.original.data.id_persona);
                    enabledTabs("menu2-tab");
                    setTimeout("$('#menu2-tab').trigger('click')", 2500);
                    let $option = $('<option />', {
                        text: namePersona,
                        value: data.info.original.data.id_persona,
                    });
                    $('#id_persona_two').prepend($option);
                }
            },
            error: function(response){
               console.log(response);
                 $('#image-input-error').text(response.responseJSON.errors.file);
            }
        });
 
   });

    $("#btnGuardarM1").on('click', function(e){
        e.preventDefault();

        
        let data = $("#firstForm").serialize();



        
        $.ajax({
            url: "createPerson",
            type:'POST',
            data: data,
            success: function(data) {
                console.log(data);
                $("#errFormPersona").css({'display':'none'});
                if(data.status){
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    let namePersona = data.info.original.data.nombre+' '+data.info.original.data.primer_apellido;
                    $("#nameColaborate").val(namePersona);
                    $("#idColaborate").val(data.info.original.data.id_persona);
                    enabledTabs("menu2-tab");
                    setTimeout("$('#menu2-tab').trigger('click')", 2500);
                    let $option = $('<option />', {
                        text: namePersona,
                        value: data.info.original.data.id_persona,
                    });
                    $('#id_persona_two').prepend($option);
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
});




function enabledTabs(idTab){
    $("#"+idTab).removeClass('disabled');
}
function calcularEdad(){
    let dateFirst, dateLast, age;
    dateFirst = $("#fecha_nacimiento").val().substring(0, 4);
    dateLast = $("#fechaActual").val().substring(0, 4);
    age = dateFirst - dateLast;
    $("#edad").val(Math.abs(age)+' años');
}



$("#btnNext").on('click', function(){
    enabledTabs("menu5-tab");
    $('#menu5-tab').trigger('click')
});
$("#btnNextTwo").on('click', function(){
    enabledTabs("menu4-tab");
    $('#menu4-tab').trigger('click')
});
