<?php



$action = (string) $_GET['action'];
//http://127.0.0.1/books/?action=pierre  donc GET=pierre     // ici c'est le rooter

switch ($action) {
  case "books":
    require_once('controllers/books.php');
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    listBooks($page);
  break;
  case "book":
    if (isset($_GET['id'])) {
      require_once('controllers/books.php');
      showBook($_GET ['id']);
    }
    break;
  default:
    require('views/404.php');

}

