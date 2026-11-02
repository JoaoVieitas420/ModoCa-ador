<?php
// debug
// print_r($data);
?>

<h2>Editar Artigo</h2>
<form action="<?php echo $url_alias;?>/artigo/update/<?php echo $data['artigo'][0]['id'];?>" method="POST">
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome" value="<?php echo $data['artigo'][0]['nome']; ?>" required><br>

  <label for="preco">Preço (€):</label>
  <input type="number" step="0.01" min="0" id="preco" name="preco" value="<?php echo $data['artigo'][0]['preco']; ?>" required><br>

  <label for="avaliacao">Avaliação:</label>
  <input type="number" step="0.1" id="avaliacao" name="avaliacao" value="<?php echo $data['artigo'][0]['avaliacao']; ?>" required><br>

  <label for="ano">Ano:</label>
  <input type="number" id="ano" name="ano" value="<?php echo $data['artigo'][0]['ano']; ?>" required><br>

  <label for="imagem">Imagem (opcional):</label>
  <input type="text" id="imagem" name="imagem" value="<?php echo htmlspecialchars($data['artigo'][0]['imagem'] ?? ''); ?>"><br>

  <label for="categoria_id">Categoria:</label>
  <select id="categoria_id" name="categoria_id" required>
    <?php foreach ($data['categorias'] as $categoria) {?>
      <option value="<?php echo $categoria['id']; ?>" <?php echo ($data['artigo'][0]['categoria_id'] == $categoria['id']) ? 'selected' : ''; ?>>
        <?php echo $categoria['categoria']; ?>
      </option>
    <?php } ?>
  </select><br>

  <button type="submit">Atualizar Artigo</button>
</form>
<a href="<?php echo $url_alias;?>/artigo">Voltar</a>
