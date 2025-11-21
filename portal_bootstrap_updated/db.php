<?php
function getPDO(){
  $dbfile = __DIR__ . '/data/news.db';
  if (!file_exists($dbfile)) {
    // give friendly message
    die('Database not found. Run <a href="setup.php">setup.php</a> first.');
  }
  $pdo = new PDO('sqlite:' . $dbfile);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}
session_start();
function isLoggedIn(){
  return isset($_SESSION['user']);
}
function requireLogin(){
  if (!isLoggedIn()){
    header('Location: login.php');
    exit;
  }
}
?>