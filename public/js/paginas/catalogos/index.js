$(function () {
    // $('#tbl_categorias').DataTable();

    async function tblCategorias() {
        
        try {
            // console.log("Cargando tabla...");
          
            let peticion = await fetch(servidor + `catalogos/getCategorias`)
            let response = await peticion.json();
            $('#tbl_categorias').DataTable().destroy();
            $('#tbl_categorias').DataTable({
                "bProcessing": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                "pageLength": 5,
                "lengthMenu": [[5, 10, -1], [5, 10, "All"]],
                data: response,
                "columns": [
                    {"data": "nombre_categoria" },
                    {"data": "estatus_categoria"},
                    {
                        "data": null,
                        "bSortable": false,
                        "mRender": function(value) {
                            return '<button id="btnActivar" class="btn btn-info btn_edit" value='+value["id_categoria"]+' data-toggle="modal" data-target="#modalEdit"><span><i class="fa fa-edit"></i></span></button>';
                        }
                    }
                ]
            });
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }

    tblCategorias();

    $('table#tbl_categorias').on("click","button.btn_edit", function(event) {
        let id_categoria = $(this).val();

        $.ajax({
            type : 'POST',
            url  : servidor + 'catalogos/getCategoriaById',
            dataType: 'json',
            data : {id_categoria},
            beforeSend: function() {
                // setting a timeout               
                console.log("Procesando...");
            },
            success :  function(data){
                console.log(data);
                console.log(data.nombre_categoria);

                let options = '';

                if(data.status == 1){
                    options = `<option value='1' selected>Activo</option>
                    <option value='0'>Inactivo</option>`;
                }else{
                    options = `<option value='1'>Activo</option>
                    <option value='0' selected>Inactivo</option>`;
                }               

                $("#cat_id_categoria").val(id_categoria);
                $("#cat_edit_nombre").val(data.nombre_categoria);
                $("#cat_edit_estatus").html(options);
                
            },
            error: function (data) {
                    console.log(data);
            },
            complete: function() {
                // $("#loading").removeClass('loading');
            }
        });        
    });

    $("#form_edit_categoria").on("submit",function(event){
        event.preventDefault();
        let form = $(this).serialize();
        
        $.ajax({
            type : 'POST',
            url  : servidor + 'catalogos/editCategoria',
            dataType: 'json',
            data : form,
            beforeSend: function() {
                // setting a timeout               
                console.log("Procesando...");
            },
            success :  function(data){
                console.log(data);
                
                swal({
                    icon: data.estatus,
                    title: data.title,
                    text: data.text,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    buttons: false,
                    timer: 2000
                });

                tblCategorias();

                $("#modalEdit").modal('toggle');
                
            },
            error: function (data) {

                console.log(data);
                swal({
                    icon: data.estatus,
                    title: data.title,
                    text: data.text,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    buttons: false,
                    timer: 2000
                });
            },
            complete: function() {
                // $("#loading").removeClass('loading');
            }
        });     
    });

    $("#form_crear_categoria").on("submit",function(event) {
        event.preventDefault();
        let form = $("#form_crear_categoria");
        if (form[0].checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        } else {
            $.ajax({
                type : 'POST',
                url  : servidor + 'catalogos/crearCategoria',
                dataType: 'json',
                data : form.serialize(),
            beforeSend: function() {
                // setting a timeout
                console.log("Procesando...");
            },
            success :  function(data){                
                console.log(data);
                swal({
                    icon: data.estatus,
                    title: data.title,
                    text: data.text,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    buttons: false,
                    timer: 2000
                });

                tblCategorias();
            },
            error: function (data) {
                console.log(data);
                swal({
                    icon: data.estatus,
                    title: data.title,
                    text: data.text,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    buttons: false,
                    timer: 2000
                });
            },
            complete: function() {
                // $("#loading").removeClass('loading');
            }
            });
        }
        form.addClass('was-validated');
    });
});