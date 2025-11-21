<?php
require 'db.php';
requireLogin();
$pdo = getPDO();
$items = $pdo->query('SELECT * FROM news ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html><html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Painel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/dark.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Painel administrativo</h3>
    <div>
      <a class="btn btn-sm btn-outline-secondary" href="index.php">Ver site</a>
      <a class="btn btn-sm btn-danger" href="logout.php">Sair</a>
    </div>
  </div>
  <a class="btn btn-primary mb-3" href="add.php">Adicionar notícia</a>
  <table class="table table-striped">
    <thead><tr><th>#</th><th>Título</th><th>Data</th><th>Ações</th></tr></thead>
    <tbody>
    <?php foreach($items as $row): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
          <a class="btn btn-sm btn-secondary" href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
          <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body></html>