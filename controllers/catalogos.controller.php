<?php
class Catalogos extends ControllerBase
{
    function __construct()
    {
        parent::__construct();
       
    }
    function catalogoEstados(){
        $data = $this->model->catalogoEstados();
        echo json_encode($data);
        return 0;
      }
      function catalogoMunicipios($param = null){
        $data = $this->model->catalogoMunicipios($param[0]);
        echo json_encode($data);
        return 0;
      }
      function catalogoColonias($param = null){
        $data = $this->model->catalogoColonias($param[0]);
        echo json_encode($data);
        return 0;
      }
      function catalogoCategorias(){
        $data = $this->model->catalogoCategorias();
        echo json_encode($data);
        return 0;
      }
      public function catalogoPrefijos(){
        $data = $this->model->catalogoPrefijos();
        echo json_encode($data);
        return 0;
      }
      public function catalogoLadas(){
        $data = $this->model->catalogoLadas();
        echo json_encode($data);
      }
      public function categorias(){
        $this->view->render('catalogos/categorias');
      }
      public function getCategorias(){
        $data = $this->model->catalogoCategorias();
        echo json_encode($data);
        return 0;
      }
      public function getCategoriaById(){
        $id_categoria = $_POST['id_categoria'];
        $data = $this->model->categoriaById($id_categoria);
        echo json_encode($data);
        return 0;
      }
      public function editCategoria(){

        $id_categoria = $_POST['cat_id_categoria'];
        $nombre_categoria = $_POST['cat_edit_nombre'];
        $estatus_categoria = $_POST['cat_edit_estatus'];

        $data = [
          'id_categoria' => $id_categoria,
          'nombre_categoria' => $nombre_categoria,
          'estatus_categoria' => $estatus_categoria
        ];

        $update = $this->model->updateCategoria($data);

        if($update == 1){
          $datos = [
            'estatus' => 'success',
            'title' => 'Exito.',
            'text' => '¡Datos actuliazdos correctamente!'
          ];
        }else{
          $datos = [
            'estatus' => 'error',
            'title' => 'Error.',
            'text' => '¡Hubo un error al actulizar los datos!'
          ];
        }

        echo json_encode($datos);
      }

}

?>