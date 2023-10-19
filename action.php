<?php
  require_once 'conx.php';
  $dsn = 'mysql:host=' . 'localhost' . ';dbname=' .  'BookStor' . '';
  try {

    $con = new PDO($dsn, "root", "");
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
  }
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT nom FROM products WHERE nom LIKE :country';
    $stmt = $con->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['nom'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>