<?php
require 'db.php';
requireLogin();
$pdo = getPDO();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'] ?? '';
  $summary = $_POST['summary'] ?? '';
  $content = $_POST['content'] ?? '';
  $imageName = '';
  if (!empty($_FILES['image']['name'])) {
    $tmp = $_FILES['image']['tmp_name'];
    $orig = basename($_FILES['image']['name']);
    $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.\-]/', '_', $orig);
    move_uploaded_file($tmp, __DIR__.'/uploads/'.$imageName);
  }
  $ins = $pdo->prepare('INSERT INTO news (title,summary,content,image) VALUES (:t,:s,:c,:i)');
  $ins->execute([':t'=>$title,':s'=>$summary,':c'=>$content,':i'=>$imageName]);
  header('Location: admin.php');
  exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Adicionar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>
<div class="container mt-4">
  <a href="admin.php" class="btn btn-link">&larr; Voltar</a>
  <h3>Adicionar notícia</h3>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-2"><input name="title" class="form-control" placeholder="Título" required></div>
    <div class="mb-2"><input name="summary" class="form-control" placeholder="Resumo" required></div>
    <div class="mb-2"><textarea name="content" class="form-control" rows="6" placeholder="Conteúdo"></textarea></div>
    <div class="mb-2"><input type="file" name="image" class="form-control"></div>
    <button class="btn btn-primary">Salvar</button>
  </form>
</div>
</body></html>