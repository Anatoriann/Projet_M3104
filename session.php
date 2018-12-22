<?php
session_start();
if (!isset($_SESSION['pseudo']) and !isset($_SESSION['id'])) {
  header('Location: connexion.php');
}
?>
