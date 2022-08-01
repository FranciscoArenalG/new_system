<?php

/**
 *
 */
include_once "models/usuario.model.php";
class CatalogosModel extends ModelBase
{

    public function __construct()
    {
        parent::__construct();
    }
    public function catalogoEstados()
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT * FROM cat_estado
            ");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }
    public function catalogoMunicipios($estado)
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT * FROM cat_delegacion
                WHERE fk_id_estado in (?)
                AND estatus_delegacion = 1
            ");
            $query->execute([$estado]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }
    public function catalogoColonias($municipio)
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT * FROM cat_colonia
                WHERE fk_id_delegacion in (?)
                AND estatus_colonia = 1
            ");
            $query->execute([$municipio]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }
    public function catalogoPrefijos()
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT * FROM cat_prefijos
                WHERE estatus_prefijo = 1
            ");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }
    public function catalogoLadas()
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT * FROM cat_ladas
                WHERE estatus_lada = 1
            ");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }
    public function catalogoCategorias()
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT id_categoria, nombre_categoria, (case when estatus_categoria = 1 then 'Activo' else 'Inactivo' end) as estatus_categoria FROM cat_categoria
            ");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }

    public function categoriaById($id_categoria)
    {
        try {
            $query = $this->db->connect()->prepare("
                SELECT id_categoria, nombre_categoria, (case when estatus_categoria = 1 then 'Activo' else 'Inactivo' end) as estatus_categoria, estatus_categoria as status FROM cat_categoria
                WHERE id_categoria = $id_categoria
            ");
            $query->execute();
            return $query->fetch();
        } catch (PDOException $e) {
            echo "Error recopilado: " . $e->getMessage();
            return false;
        }
    }

    public function updateCategoria($data)
    {
        try {
            $query = $this->db->connect()->prepare("
                UPDATE cat_categoria set 
                nombre_categoria = :nombre_categoria,
                estatus_categoria = :estatus_categoria
                WHERE id_categoria = :id_categoria
            ");
            // $query->execute(['id_categoria' => $data['id_categoria'], 'nombre_categoria' => $data['nombre_categoria'], 'estatus_categoria' => $data['estatus_categoria']]);
            return $query->execute($data);
            
        } catch (PDOException $e) {
            // echo "error: " . $e->getMessage();
            return false;
        }
    }
}
