
$(document).ready(function () {

    $('.searchInput').click(function () {

        var tipo = $(this).attr('type');
        $('input:radio[name=radioEstado]').attr('checked', false);
        //console.log(tipo);
        if (tipo === 'radio') {
            $('.noRadio').val('');
            $('.noRadio').attr('required', false);
            $('.noRadio').attr('readonly', true);
            $(this).attr('checked', true);

        } else {
            $('.noRadio').val('');
            $('.noRadio').attr('required', false);
            $('.noRadio').attr('readonly', true);
            $(this).attr('readonly', false);
            $(this).attr('required', true);
        }
    });


    //FUNCION OCULTAR DATOS DEL SINIESTRO AUTO

    $('#checkbox1').click(function () {
        if (!$(this).prop('checked')) {
            $('.ocultar1').show("slow");
            elimDivAdj();

        } else {
            $('.ocultar1').hide("slow");
            addCampo();
        }
    });

    $('#checkbox2').click(function () {
        if (!$(this).prop('checked')) {
            $('.ocultar2').show("slow");
        } else {
            $('.ocultar2').hide("slow");
        }
    });
    //FUNCION OCULTAR DATOS DEL SINIESTRO DIVERSOS

    $('#checkbox3').click(function () {
        if (!$(this).prop('checked')) {
            $('.ocultar3').show("slow");
            elimDivAdj();
        } else {
            $('.ocultar3').hide("slow");
            addCampo();
        }
    });
    
    $('#checkbox4').click(function () {
        if (!$(this).prop('checked')) {
            $('.ocultar4').show("slow");
        } else {
            $('.ocultar4').hide("slow");
        }
    });

//#############################################################

    /*
     
     $.fn.checkFileType = function (options) {
     var defaults = {
     allowedExtensions: [],
     success: function () {},
     error: function () {}
     };
     options = $.extend(defaults, options);
     
     return this.each(function () {
     
     $(this).on('change', function () {
     var value = $(this).val(),
     file = value.toLowerCase(),
     extension = file.substring(file.lastIndexOf('.') + 1);
     
     if ($.inArray(extension, options.allowedExtensions) === -1) {
     options.error();
     $(this).focus();
     } else {
     options.success();
     
     }
     
     });
     
     });
     };
     
     */

    $("input.fup").each(function () {

        var file = $(this).val();
        console.log(file);
        var ext = file.substring(file.lastIndexOf("."));
        var file_size = file.size;
        console.log(file_size);


        $("#file_error").html("");
        $(".fup").css("border-color", "#F0F0F0");



        // if ((ext !== ".jpg" || ext !== ".png" || ext !== ".gif" || ext !== ".jpeg" || ext !== ".pdf") && (file_size < 5097152)) {
        if (file_size > 5097152) {
            $("#file_error").html("El archivo supera los 5MB o no es pdf o imagen");
            $(".fup").css("border-color", "#FF0000");
            //return false;
            valido = false;
            return false;
        }
        //return true;
        else {
            valido = true;
            return true;
        }
    });
    
   //Ahora validamos el formulario
 
if(valido === false){
    alert("La extensión " + ext + " no es una imagen");
}


    

});// ready


var numero = 0;
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado 
    return (!evt) ? event : evt;
};


addCampo = function () {
    // Creamos un nuevo div para que contenga el nuevo campo
    nDiv = document.createElement('div');
    nDiv.id = 'file' + (++numero);
    //creamos el input para el formulario:
    nCampo = document.createElement('input');
    nCampo.name = 'archivo[]';
    nCampo.type = 'file';
    nCampo.id = 'archivo[]';
    nCampo.className = 'fup';
    nCampo.setAttribute('required', 'required');

    span = document.createElement('span');
    span.id = 'file_error';


    a = document.createElement('a');
    a.name = nDiv.id;
    a.href = 'javascript:void(0)';
    a.onclick = elimCamp;
    a.innerHTML = 'Eliminar';

    nDiv.appendChild(span);
    nDiv.appendChild(nCampo);
    nDiv.appendChild(a);
    container = document.getElementById('adjuntos');
    container.appendChild(nDiv);
};
//con esta función eliminamos el campo cuyo link de eliminación sea presionado 
elimCamp = function (evt) {
    evt = evento(evt);
    nCampo = rObj(evt);
    div = document.getElementById(nCampo.name);
    div.parentNode.removeChild(div);
};
//con esta función recuperamos una instancia del objeto que disparo el evento 
rObj = function (evt) {
    return evt.srcElement ? evt.srcElement : evt.target;
};

function unselect() {
    document.querySelectorAll('[name=radioEstado]').forEach((x) => x.checked = false);
}

elimDivAdj = function () {
    /* evt = evento(evt);
     nCampo = rObj(evt);*/
    div = document.getElementById(nDiv.id);
    div.parentNode.removeChild(div);
};



function validate() {
    $("#file_error").html("");
    $(".fup").css("border-color", "#F0F0F0");

    var file_size = $('.fup')[0].files[0].size;

    // var extensionesPermitidas = new Array(".jpg", ".jpeg", ".png", ".gif", ".pdf");
    if (file_size > 5097152) {
        $("#file_error").html("El archivo supera los 5MB");
        $(".fup").css("border-color", "#FF0000");
        return false;
    }
    return true;
}


//function validate() {

  //  var extensionesPermitidas = new Array(".jpg", ".jpeg", ".png", ".gif", ".pdf");

//    $("input.fup").each(function () {
//
//        var file = $(this).val();
//        console.log(file);
//        var ext = file.substring(file.lastIndexOf("."));
//        var file_size = file.size;
//        console.log(file_size);
//
//
//        $("#file_error").html("");
//        $(".fup").css("border-color", "#F0F0F0");
//
//
//
//        // if ((ext !== ".jpg" || ext !== ".png" || ext !== ".gif" || ext !== ".jpeg" || ext !== ".pdf") && (file_size < 5097152)) {
//        if (file_size > 5097152) {
//            $("#file_error").html("El archivo supera los 5MB o no es pdf o imagen");
//            $(".fup").css("border-color", "#FF0000");
//            //return false;
//            valido = false;
//            return false;
//        }
//        //return true;
//        else {
//            valido = true;
//            return true;
//        }
//    });
//}

//Ahora validamos el formulario

//    if (valido === false) {
//        alert("La extensión " + ext + " no es una imagen o un pdf");
//    }
//}
