<?php
use app\core\Controller;
class Artigo extends Controller {
  /**
  * Invocação da view index.php
  */
  public function index() {
    $Artigos = $this->model('Artigos'); // é retornado o model Artigos()
    $data = $Artigos::getAllArtigos();
    /*
    $Artigos = new Artigos();
    $data = $Artigos->getAllArtigos();
    ------------------------------------------------------
    $Artigos = "Artigos";
    $data = $Artigos::getAllArtigos();
    */
    $this->view('artigo/index', ['artigos' => $data]);
  }

  /**
  * Invocação da view get.php
  *
  * @param  int   $id   Id. artigo
  */
  public function get($id = null) {
    if (is_numeric($id)) {
      $Artigos = $this->model('Artigos');
      $Categorias = $this->model('Categorias'); 
      $data = $Artigos::findArtigoById($id);
      $categorias = $Categorias::getAllCategorias();
      $this->view('artigo/get', ['artigos' => $data, 'categorias' => $categorias]);
    } else {
       $this->pageNotFound();
    }
  }

  public function create() {
    $Artigos = $this->model('Artigos');
    $Categorias = $this->model('Categorias'); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $newArtigoData = [
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'avaliacao' => $_POST['avaliacao'],
        'ano' => $_POST['ano'],
        'imagem' => ($_POST['imagem'] ?? '') !== '' ? $_POST['imagem'] : null,
        'categoria_id' => $_POST['categoria_id']
      ];
      $info = $Artigos::addArtigo($newArtigoData);

      $data = $Artigos::getAllArtigos();
      $this->view('artigo/index', ['artigos' => $data, 'info' => $info, 'type' => 'INSERT']);
    } else {
      $categorias = $Categorias::getAllCategorias();
      $this->view('artigo/create', ['categorias' => $categorias]);
    }
  }

  public function update($id = null) {
    $Artigos = $this->model('Artigos');
    $Categorias = $this->model('Categorias');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $updatedArtigoData = [
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'avaliacao' => $_POST['avaliacao'],
        'ano' => $_POST['ano'],
        'imagem' => ($_POST['imagem'] ?? '') !== '' ? $_POST['imagem'] : null,
        'categoria_id' => $_POST['categoria_id']
      ];
      $info = $Artigos::updateArtigo($id, $updatedArtigoData);
      
      $data = $Artigos::getAllArtigos();
      $this->view('artigo/index', ['artigos' => $data, 'info' => $info, 'type' => 'UPDATE']);
    } else {
      $data = $Artigos::findArtigoById($id);
      $categorias = $Categorias::getAllCategorias(); 
      $this->view('artigo/update', ['artigo' => $data, 'categorias' => $categorias]);
    }
  }

  public function delete($id = null) {
    if (is_numeric($id)) {
      $Artigos = $this->model('Artigos');
      $info = $Artigos::deleteArtigo($id);

      $data = $Artigos::getAllArtigos();
      $this->view('artigo/index', ['artigos' => $data, 'info' => $info, 'type' => 'DELETE']);
    } else {
      $this->pageNotFound();
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
?>