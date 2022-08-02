<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?= $this->icono; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias - <?= $this->sociedad; ?></title>
</head>

<body>
    <?php require "views/header.view.php"; ?>

    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-md-6">
                    Categorias
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills mb-3 d-flex justify-content-end" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-todas-tab" data-toggle="pill" data-target="#pills-todas" type="button" role="tab" aria-controls="pills-todas" aria-selected="true">Todas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-crear-tab" data-toggle="pill" data-target="#pills-crear" type="button" role="tab" aria-controls="pills-crear" aria-selected="false">Crear</button>
                        </li>

                    </ul>
                </div>
            </div>


        </div>
        <div class="card-body">

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-todas" role="tabpanel" aria-labelledby="pills-todas-tab">
                    <!-- Mostar categorias -->
                    <div class="card">
                        <div class="card-header">
                            Lista de Categorias
                        </div>

                        <div class="card-body">
                            <table id="tbl_categorias" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Estatus</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- end mostar categorias -->
                </div>

                <div class="tab-pane fade" id="pills-crear" role="tabpanel" aria-labelledby="pills-crear-tab">
                    <!-- Crear categorias -->
                    <div class="card">
                        <div class="card-header">
                            Crear Categorias
                        </div>

                        <div class="card-body">
                            <form id="form_crear_categoria" action="#" class="needs-validation" novalidate >
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2">
                                        <label class="font-weight-bold">Nombre</label>
                                        <input class="form-control mayusculas" type="text" name="crear_cat" id="crear_cat" placeholder="Nombre" required>
                                        <div class="invalid-feedback">
                                            Introduzca nombre.
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>                                    
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- end Crear categorias -->
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_edit_categoria" action="#" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row">

                            <input type="hidden" id="cat_id_categoria" name="cat_id_categoria">

                            <div class="col-sm-12 col-md-12">
                                <label class="font-weight-bold">Nombre Categoria</label>
                                <input class="form-control" type="text" name="cat_edit_nombre" id="cat_edit_nombre" required>
                                <div class="invalid-feedback">
                                    Introduzca un Nombre.
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <label class="font-weight-bold">Estatus</label>
                                <select class="form-control select2" name="cat_edit_estatus" id="cat_edit_estatus" required>
                                    <!-- <option value="1">Activo</option>
                            <option value="2">Inactivo</option> -->
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "views/footer.view.php"; ?>
    <script>
        let servidor = '<?= constant("URL"); ?>';
    </script>
    <script src="<?php echo constant("URL"); ?>public/js/paginas/catalogos/index.js"></script>
</body>

</html>