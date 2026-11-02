<?php
namespace app\models;
use app\core\Db;

class Categorias {

  public static function getAllCategorias() {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, categoria FROM categorias');
    return $response;
  }

}
?>
