<pre>
<?php 
// debug
// print_r($data);
?>
</pre>

<?php
if (count($data['artigos']) == 0) {
?>
  <h1>O artigo não existe na nossa base de dados...</h1>
<?php 
} else {
  $idCategoria = $data['artigos'][0]['categoria_id'];
  $categoria_filtrada = array_filter($data['categorias'], function ($categoria) use ($idCategoria) {
      return $categoria['id'] == $idCategoria;
  });
  $values = array_values($categoria_filtrada);
  $categoria_descr = $values[0]['categoria'];
?>

  <div>
  <?php
  echo "Nome: " . $data['artigos'][0]['nome'];
  ?>
  </div>

  <div>
  <?php
  echo "Preço: " . $data['artigos'][0]['preco'] . " €";
  ?>
  </div>

  <div>
  <?php
  echo "Avaliação: " . $data['artigos'][0]['avaliacao'];
  ?>
  </div>

  <div>
  <?php
  echo "Ano: " . $data['artigos'][0]['ano'];
  ?>
  </div>

  <?php if (!empty($data['artigos'][0]['imagem'])) { ?>
  <div>
    <img src="<?php echo htmlspecialchars($data['artigos'][0]['imagem']); ?>" alt="<?php echo htmlspecialchars($data['artigos'][0]['nome']); ?>" style="max-width:300px">
  </div>
  <?php } ?>

  <div>
  <?php
  echo "Categoria: " . $categoria_descr;
  ?>
  </div>
<?php 
}
?>
<a href="<?php echo $url_alias;?>/artigo">Voltar</a>