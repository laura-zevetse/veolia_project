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
                    enabledTabs("menu2-tab");
                    setTimeout("$('#menu2-tab').trigger('click')", 3500);
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
                        $(".print-error-msg").find("ul").append('<li>'+value.toString().replace('id persona', 'Número de documento')+'</li>');
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
    $("#edad").val(Math.abs(age));
}
