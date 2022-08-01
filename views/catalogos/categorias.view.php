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
            Categorias
        </div>
        <div class="card-body">

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