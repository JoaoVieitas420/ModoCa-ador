<?php

namespace app\models;

use app\core\Db;
class Artigos {
  /**
  * Método para obtenção do dataset de todos os artigos
  *
  * @return   array
  */
  public static function getAllArtigos() {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome, preco, avaliacao, ano, imagem FROM artigos');
    return $response;
  }

  /**
  * Método para a obtenção de um artigo pelo id correspondente
  * @param    int     $id   Id. do artigo
  *
  * @return   array
  */
  public static function findArtigoById(int $id) {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome, preco, avaliacao, ano, imagem, categoria_id FROM artigos WHERE id = ?', array('i', array($id)));
    return $response;
  }

  public static function addArtigo($data) {
    $conn = new Db();
    $response = $conn->execQuery('INSERT INTO artigos (nome, preco, avaliacao, ano, imagem, categoria_id) VALUES (?, ?, ?, ?, ?, ?)', array(
      'sdsisi',
      array($data['nome'], $data['preco'], $data['avaliacao'], $data['ano'], $data['imagem'], $data['categoria_id'])
    ));
    return $response;
  }

  public static function updateArtigo($id, $data) {
    $conn = new Db();
    $response = $conn->execQuery('UPDATE artigos SET nome = ?, preco = ?, avaliacao = ?, ano = ?, imagem = ?, categoria_id = ? WHERE id = ?', array(
      'sdsisii',
      array($data['nome'], $data['preco'], $data['avaliacao'], $data['ano'], $data['imagem'], $data['categoria_id'], $id)
    ));
    return $response;
  }

  public static function deleteArtigo($id) {
    $conn = new Db();
    $response = $conn->execQuery('DELETE FROM artigos WHERE id = ?', array(
      'i', array($id)
    ));
    return $response;
  }

  

}