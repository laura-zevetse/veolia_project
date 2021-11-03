$("#btnGuardarM3").on('click', function(e){
    e.preventDefault();
    let data = $("#formThree").serialize();
    $.ajax({
        url: "contrato",
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
                enabledTabs("menu4-tab");
                setTimeout("$('#menu4-tab').trigger('click')", 3500);
            }
        },
        error: function(err){
            console.error("tenemos inconvenientes");
            $("#errFormContrato").find("ul").html('');
            $("#errFormContrato").css('display','block');
            var obj = JSON.parse(err.responseText);
            Object.entries(obj.errors).forEach(([key, value]) => {
                    $("#errFormContrato").find("ul").append('<li>'+value.toString().replace('id persona', 'Número de documento')+'</li>');
            });
        }
    });
});