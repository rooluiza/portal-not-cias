<?php
require 'db.php';
$pdo = getPDO();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare('SELECT * FROM news WHERE id = :id');
$stmt->execute([':id'=>$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) die('Notícia não encontrada.');
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo htmlspecialchars($row['title']); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/dark.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <a href="index.php" class="btn btn-link">&larr; Voltar</a>
  <h1><?php echo htmlspecialchars($row['title']); ?></h1>
  <p class="text-muted"><?php echo $row['created_at']; ?></p>
  <?php if ($row['image']): ?>
    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" class="img-fluid mb-3" style="max-height:400px;object-fit:cover;">
  <?php endif; ?>
  <div><?php echo nl2br(htmlspecialchars($row['content'])); ?></div>
</div>
</body>
</html>