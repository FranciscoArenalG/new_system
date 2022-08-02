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

      public function crearCategoria(){
        $nombre_categoria = $_POST['crear_cat'];
        $data = [
          'nombre_categoria' => $nombre_categoria,
          'clave_categoria' => $this->generateRandomString(6),
          'estatus_categoria' => 1
        ];


        try {
          if ($this->model->crearCategoria($data)) {
            //echo "Se registro correctamente, bienvenido/a";
            $datos = [
              'estatus' => 'success',
              'title' => 'Registro exitoso',
              'text' => 'Se registro correctamente la categoria.'
            ];
          }else{
            //echo "El correo ingresado ya se encuentra registrado";
            $datos = [
              'estatus' => 'warning',
              'title' => 'Error al guardar',
              'text' => 'Ocurrió un error al guardar la infromación, si el problema persiste favor de llamar al area de sistemas.'
            ];
          }
        } catch (\Throwable $th) {
          $datos = [
            'estatus' => 'error',
            'title' => 'Error al guardar',
            'text' => 'Ocurrió un error al guardar la infromación, si el problema persiste favor de llamar al area de sistemas.'
          ];
          
        }
        echo json_encode($datos);
      
      }

      public function generateRandomString($length = 6) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
      } 

}

?>