<?php
require 'db.php';
requireLogin();
$pdo = getPDO();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare('SELECT * FROM news WHERE id = :id');
$stmt->execute([':id'=>$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) die('Notícia não encontrada.');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'] ?? '';
  $summary = $_POST['summary'] ?? '';
  $content = $_POST['content'] ?? '';
  $imageName = $row['image'];
  if (!empty($_FILES['image']['name'])) {
    $tmp = $_FILES['image']['tmp_name'];
    $orig = basename($_FILES['image']['name']);
    $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.\-]/', '_', $orig);
    move_uploaded_file($tmp, __DIR__.'/uploads/'.$imageName);
  }
  $upd = $pdo->prepare('UPDATE news SET title=:t,summary=:s,content=:c,image=:i WHERE id=:id');
  $upd->execute([':t'=>$title,':s'=>$summary,':c'=>$content,':i'=>$imageName,':id'=>$id]);
  header('Location: admin.php');
  exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Editar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>
<div class="container mt-4">
  <a href="admin.php" class="btn btn-link">&larr; Voltar</a>
  <h3>Editar notícia</h3>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-2"><input name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required></div>
    <div class="mb-2"><input name="summary" class="form-control" value="<?php echo htmlspecialchars($row['summary']); ?>" required></div>
    <div class="mb-2"><textarea name="content" class="form-control" rows="6"><?php echo htmlspecialchars($row['content']); ?></textarea></div>
    <div class="mb-2">
      <?php if ($row['image']): ?>
        <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" style="max-width:200px;display:block;margin-bottom:8px;">
      <?php endif; ?>
      <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Salvar</button>
  </form>
</div>
</body></html>