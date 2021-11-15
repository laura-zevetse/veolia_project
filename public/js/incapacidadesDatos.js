$(document).ready(function(e) {
    $("#id_contrato").select2();
    $("#id_tipo_incapacidad").select2();
    $("#eps").select2();
    alert(1);
    $("#btnIncapacidad").on('click', function(e){
        e.preventDefault();
        let data = $("#formularioIncapacidad").serialize();
        $.ajax({
            url: "createIncap",
            type:'POST',
            data: data,
            success: function(data) {
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
