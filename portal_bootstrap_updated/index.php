<?php
require 'db.php';
$pdo = getPDO();
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
if ($search !== '') {
  $stmt = $pdo->prepare("SELECT * FROM news WHERE title LIKE :s OR summary LIKE :s ORDER BY created_at DESC");
  $stmt->execute([':s'=>'%'.$search.'%']);
} else {
  $stmt = $pdo->query("SELECT * FROM news ORDER BY created_at DESC");
}
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Portal de Notícias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
<?php $featured = count($items) ? $items[0] : null; ?>

    <a class="navbar-brand" href="index.php">Portal de Notícias</a>
    <div>
      <?php if (isLoggedIn()): ?>
        <a class="btn btn-sm btn-outline-primary" href="admin.php">Painel</a>
        <a class="btn btn-sm btn-outline-secondary" href="logout.php">Sair</a>
      <?php else: ?>
        <a class="btn btn-sm btn-primary" href="login.php">Entrar</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container">
<?php $featured = count($items) ? $items[0] : null; ?>

  <form class="mb-3" method="get" action="index.php">
    <div class="input-group">
      <input class="form-control" name="q" placeholder="Buscar notícias..." value="<?php echo htmlspecialchars($search); ?>">
      <button class="btn btn-outline-secondary">Buscar</button>
    </div>
  </form>

  <?php if ($featured): ?>
  <div class="hero">
    <?php if ($featured['image']): ?>
      <img src="uploads/<?php echo htmlspecialchars($featured['image']); ?>" class="hero-img">
    <?php endif; ?>
    <div class="hero-body">
      <h2 class="h3 card-title"><?php echo htmlspecialchars($featured['title']); ?></h2>
      <p class="text-muted small"><?php echo $featured['created_at']; ?></p>
      <p><?php echo nl2br(htmlspecialchars($featured['summary'])); ?></p>
      <a href="view.php?id=<?php echo $featured['id']; ?>" class="btn btn-sm btn-primary">Ler a matéria</a>
    </div>
  </div>
  <?php endif; ?>

  <div class="row">
    <?php if (!$items): ?>
      <p class="text-muted">Nenhuma notícia encontrada.</p>
    <?php endif; ?>
    <?php foreach($items as $row): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <?php if ($row['image']): ?>
            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" style="height:180px;object-fit:cover;border-top-left-radius:8px;border-top-right-radius:8px;">
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($row['summary'])); ?></p>
            <a href="view.php?id=<?php echo $row['id']; ?>" class="mt-auto btn btn-sm btn-primary">Ler mais</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</body>
</html>