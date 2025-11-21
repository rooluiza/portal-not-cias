<?php
// Run once to create the SQLite DB and default admin user.
// After running, DELETE this file for security.
$dbfile = __DIR__ . '/data/news.db';
if (!is_dir(__DIR__ . '/data')) mkdir(__DIR__ . '/data', 0755, true);
$pdo = new PDO('sqlite:' . $dbfile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username TEXT UNIQUE,
  password TEXT,
  role TEXT DEFAULT 'admin'
);");
$pdo->exec("CREATE TABLE IF NOT EXISTS news (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title TEXT,
  summary TEXT,
  content TEXT,
  image TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);");
// create default admin if not exists
$stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE username = :u');
$stmt->execute([':u'=>'admin']);
if ($stmt->fetchColumn() == 0) {
  $hash = password_hash('admin123', PASSWORD_DEFAULT);
  $ins = $pdo->prepare('INSERT INTO users (username,password,role) VALUES (:u,:p,:r)');
  $ins->execute([':u'=>'admin', ':p'=>$hash, ':r'=>'admin']);
  echo "Default admin created: username=admin password=admin123<br>\n";
} else {
  echo "Admin already exists.<br>\n";
}
echo "Database created at: data/news.db<br>\n";
echo "IMPORTANT: For security delete setup.php after running it.<br>\n";
?>