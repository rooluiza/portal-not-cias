<?php
require 'db.php';
requireLogin();
$pdo = getPDO();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare('SELECT image FROM news WHERE id = :id');
$stmt->execute([':id'=>$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row && $row['image']) {
  @unlink(__DIR__.'/uploads/'.$row['image']);
}
$del = $pdo->prepare('DELETE FROM news WHERE id = :id');
$del->execute([':id'=>$id]);
header('Location: admin.php');
exit;
?>