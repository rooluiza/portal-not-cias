<?php
require 'db.php';
$pdo = getPDO();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = $_POST['username'] ?? '';
  $p = $_POST['password'] ?? '';
  $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :u LIMIT 1');
  $stmt->execute([':u'=>$u]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($user && password_verify($p, $user['password'])) {
    $_SESSION['user'] = ['id'=>$user['id'],'username'=>$user['username'],'role'=>$user['role']];
    header('Location: admin.php');
    exit;
  } else {
    $err = 'Usuário ou senha incorretos.';
  }
}
?>
<!doctype html><html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/dark.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container">
  <div class="row justify-content-center"><div class="col-md-4">
    <h3 class="mt-5">Entrar</h3>
    <?php if ($err): ?><div class="alert alert-danger"><?php echo $err; ?></div><?php endif; ?>
    <form method="post">
      <div class="mb-2"><input name="username" class="form-control" placeholder="Usuário"></div>
      <div class="mb-2"><input name="password" type="password" class="form-control" placeholder="Senha"></div>
      <button class="btn btn-primary w-100">Entrar</button>
    </form>
  </div></div>
</div>
</body></html>