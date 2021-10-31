$(document).ready(function(e) {
    $("#menu2-tab").addClass('disabled');
    $("#menu3-tab").addClass('disabled');
    $("#menu4-tab").addClass('disabled');
    $("#menu5-tab").addClass('disabled');
    $("#menu6-tab").addClass('disabled');
    $("#btnGuardarM1").on('click', function(e){
        e.preventDefault();
        let data = $("#firstForm").serialize();
        $.ajax({
            url: "createPerson",
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
                    enabledTabs("menu2-tab");
                    setTimeout(
                        $("#menu2-tab").trigger("click"),
                        3500
                    );
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