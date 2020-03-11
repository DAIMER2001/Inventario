$.ajaxSetup({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});

slcMant =  $("#slctipoMant");   // MANTENIMIENTO TIPO
$(function () {
    // $('#').DataTable();
    traerUsuActivo();
    $("#slccorreorespons").keyup(function () {
        traerCorreos(this.value);
        traerUsuActivo();
    });

    $("#slcusuario").change(function (e) {
        validarUsuAsignado(e.value);
        // if()
    });


});
function traerUsuActivo(){
    var  SlcUsuario = $("#slcusuario");
    var  slctecnico = $("#slctecnico");
    $.ajax({
        type: 'GET',
        url: '/getUsuActivo',
        success: function (req) {

            // Array.isArray(req)
            // req = function(obj) {
            //     // return Object.prototype.toString.call(obj) === '[object Array]';

            //     console.log(obj);
                $.each(req, function (key, reg) {

                        SlcUsuario.append('<option  value="' + reg[0].usuarioId + '">' + reg[0].nombreUsu + '</option>');
                        SlcUsuario.formSelect();
                        slctecnico.append('<option  value="' + reg[0].tecnicoId + '">' + reg[0].nombreTec + '</option>');
                        slctecnico.formSelect();

            });

            //   }
            // if(req.isArray()) {

            //     console.log(req);
            //    }
            // // var datos =  JSON.parse(req);
            // req.forEach(function(value) {
            //     console.log(value);
            //   });
            // console.log(datos)

        }
    });
}
function   validarUsuAsignado(e){
    alert(e);
}
function traerCorreos(correo) {
    $.ajax({
        type: 'POST',
        data: {
            txtcorreo: correo
        },
        url: '/traerCorreo',
        success: function (response) {
            if (!response.length) {
                $('.autocomplete').autocomplete({
                    data: {
                        "NO EXISTE CORREO FAVOR CREAR O BUSCAR OTRO RESPONSABLE": null
                    },
                });
            } else {
                // console.log(response); //MUESTRA LA INFORMACION DE AJAX
                //CONVERTIR ARRAY A OBJETO
                var correoArray = response;
                var correosResponsable = {};
                var correosResponsable_id = {};
                for (var i = 0; i < correoArray.length; i++) {
                    //countryArray[i].flag or null
                    correosResponsable[correoArray[i].email] = null;
                    // GUARDAR ID CORREO
                    correosResponsable_id[correoArray[i].email] = correoArray[i];
                }
                console.log(correosResponsable_id);
                $('.autocomplete').autocomplete({
                    "data": correosResponsable,
                    onAutocomplete: function (res) {
                        console.log("ENCONTRO " + res);
                        console.log(correosResponsable_id);
                        var id = correosResponsable_id[res]["id"];
                        buscarid(id);
                    }
                });
            }
        }
    });

}
var equipoasignado ;
 function   asignarTabla(){
    var tableData;
    var tableEquipo = $("#tbEquipo");
      tableEquipo.innerHTML = "";
    $.each(equipoasignado, function(key, reg) {
        tableData +=
            "<tr><td>" +
            (key + 1) +
            "</td><td>" +
            reg.fotoGeneral +
            "</td><td>" +
            reg.tipoEquipo +
            "</td><td>" +
            reg.nombreEquipo +
            "</td><td>" +
            reg.ubicacion +
            "</td><td><p>" +
                "<label>" +
                    "<input id='indeterminate-checkbox' type='checkbox' name='chkSoporteRegistro'  class='chkSoporteRegistro' />" +
                    "<span>Asignar Soporte</span>" +
                "</label>" +
            "</p></td></tr> "  ;
            console.log(tableData);
    });
    if (tableData){
        tableEquipo.html(tableData);
        $('#tblEquipo').DataTable();


        $('input[name=chkSoporteRegistro]').on('change', function () {
            if ($(this).is(':checked')) {
                // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
                $("#modalMant").modal("open");
                tipoMantenimiento();

                // $("#chkagregarTarjeta").prop("checked", false);

            }else{
                alert("asd");
            }
        });


        // $('input[class=chkSoporteRegistro]').on('change', function () {
        //     if ($(this).is(':checked')) {
        //         // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
        //         $("#modalMant").modal("open");
        //         // $("#chkagregarTarjeta").prop("checked", false);

        //     }else{
        //         alert("asd");
        //     }
        // });


    // $("input[class=chkSoporteRegistro]").each(function() {
    //     alert("kllego");
    //     if ($(this).is(":checked")) {
    //          Swal.fire(
    //             'Se creara un pdf para el soporte del equipo',
    //             'Complete los siguientes datos por favor!.',
    //             'success'
    //         ).then((result) => {
    //             alert("ASD");
    //            $("#modalMant").modal("open");
    //            tipoMantenimiento();
    //         })
    //     }
    // });
    }

 }
function buscarid(id) {
    $.ajax({
        type: 'POST',
        url: '/postequiporespon',
        data:{id:id },
        success: function (equipoasig) {
            equipoasignado  =   equipoasig;
            asignarTabla();
        }
    });


}
function tipoMantenimiento(){

    $.ajax({
        type: 'GET',
        url: '/gettipomant',
        success: function (mantTipo) {
            $.each(mantTipo, function(key, reg) {

                slcMant.append('<option  value="' + reg.id + '">' + reg.nombre+ '</option>');
                slcMant.formSelect();
            });

        }
    });

}
    // Swal.fire(
    //     'Seleccione un equipo asignado Por favor!',
    //     'Escoga el equipo al cual se realizara el mantenimiento.',
    //     'success'
    // ).then((result) => {

    // })
    // $(".equiposResponsable").html(
    //     '<div class="row card-panel">' +
    //     '<div class="input-field col s12">' +
    //     "<h4>EQUIPOS ASIGNADOS DE "+responsable+" </h4>" +
    //     '<table id="tblEquipos"' +
    //     'class="table table-striped table-bordered dt-responsive nowrap"' +
    //     'style="width:100%">' +
    //     "<thead>" +
    //     "<tr>" +
    //     '<th width="25%">#</th>' +
    //     '<th width="25%">NOMBRE EQUIPO  </th>' +
    //     '<th width="25%">DEPENDENCIA</th>' +
    //     '<th width="25%">MARCA</th>' +
    //     "</tr>" +
    //     "</thead>" +
    //     '<tbody id="tbmarcas">' +
    //     "</tbody>" +
    //     "</table>" +
    //     "</div>" +
    //     "</div>"
    // );
