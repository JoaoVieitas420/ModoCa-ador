<h2>Lista de Artigos</h2>
<a href="<?php echo $url_alias;?>/artigo/create">NOVO</a>

<?php
// debug
//print_r($data);

if (isset($data['info']) && isset($data['type'])) {
  $type = $data['type'];
  switch ($type) {
    case 'INSERT':
      echo '<h3>Artigo - ' . $data['info']['nome'] . ' - inserido com sucesso.</h3>';
      break;
    case 'UPDATE':
      echo '<h3>A informação do artigo - ' . $data['info'][0] . ' - foi atualizada.</h3>';
      break;
    case 'DELETE':
      echo '<h3>O artigo - ' . $data['info']['nome'] . ' - foi eliminado.</h3>';
      break;
  }
}
?>

<ul>
  <?php foreach ($data['artigos'] as $artigo) { ?>
    <li>
      <strong><?php echo $artigo['nome']; ?></strong>
      - <?php echo $artigo['preco']; ?> €
      <a href="<?php echo $url_alias;?>/artigo/get/<?php echo $artigo['id'];?>">Ver +</a> | 
      <a href="<?php echo $url_alias;?>/artigo/update/<?php echo $artigo['id'];?>">Editar</a> | 
      <a href="<?php echo $url_alias;?>/artigo/delete/<?php echo $artigo['id'];?>">Eliminar</a>
    </li>
  <?php } ?>
</ul>