<h2>Criar Novo Artigo</h2>

<form action="<?php echo $url_alias;?>/artigo/create" method="POST">
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome" required><br>

  <label for="preco">Preço (€):</label>
  <input type="number" step="0.01" min="0" id="preco" name="preco" required><br>

  <label for="avaliacao">Avaliação:</label>
  <input type="number" step="0.1" id="avaliacao" name="avaliacao" required><br>

  <label for="ano">Ano:</label>
  <input type="number" id="ano" name="ano" required><br>

  <label for="imagem">Imagem (opcional):</label>
  <input type="text" id="imagem" name="imagem"><br>

  <label for="categoria_id">Categoria:</label>
  <select id="categoria_id" name="categoria_id" required>
    <?php foreach ($data['categorias']  as $categoria) { ?>
      <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['categoria']; ?></option>
    <?php } ?>
  </select><br>

  <button type="submit">Criar Artigo</button>
</form>
<a href="<?php echo $url_alias;?>/artigo">Voltar</a>


