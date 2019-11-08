<?php


$db = new PDO ('mysql:host=localhost;dbname=books','root');

$id = isset($_GET['id']) ? (INT) $_GET['id'] : null;



$query = $db->query('SELECT * FROM authors order by name');
$authors = $query->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST ['book'])) {

    $id = isset ($_POST['id']) ? (int) $_POST ['id'] : null;

    $title = (string) $_POST['title'];
    $description = (string) $_POST['description'];
    $author_id = (int) $_POST['author_id'];
    $page = (int) $_POST['page'];
    $country = (string) $_POST['country'];
    $wikipedia_link = (string) $_POST['wikipedia_link'];
    $year = (int) $_POST['year'];
    $language = (string) $_POST['language'];


    if ($id) {
        $stmt = $db->prepare('UPDATE books SET
            title = :title , description = :description ,pages = :pages, author_id = :author_id, country = :country, wikipedia_link = :wikipedia_link, year = :year ,language = :language
            WHERE id = :id');
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
    } else {
        $stmt = $db -> prepare ('INSERT INTO `books` (`title`, `description`,`author_id`,`pages`, `country`,`wikipedia_link`,`year`,`language`)
        VALUES (:title,:description,:author_id,:page,:country,:wikipedia_link,:year,:language)');
    }

    $stmt-> bindParam(':title', $title, PDO::PARAM_STR);
    $stmt-> bindParam(':description', $description, PDO::PARAM_STR);
    $stmt-> bindParam(':author_id', $author_id, PDO::PARAM_INT);
    $stmt-> bindParam(':pages', $page, PDO::PARAM_INT);
    $stmt-> bindParam(':country', $country, PDO::PARAM_STR);
    $stmt-> bindParam(':wikipedia_link', $wikipedia_link, PDO::PARAM_STR);
    $stmt-> bindParam(':year', $year, PDO::PARAM_INT);
    $stmt-> bindParam(':language', $language, PDO::PARAM_STR);

    $stmt->execute();
    if (!$id) {
        $id = $db->lastInsertId();
         header('Location:' . $_server['REQUEST_URI'] . '?id=' . $id);
    }

}

if ($id) {

    $stmt=$db->prepare('SELECT * FROM books WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $book = $stmt->fetch();



}

?>

<!DOCTYPE html>

<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
        <div class="row text-info">
            <div class="col-md-12 text-center bg-dark">
                <h1><?php echo !isset ($book) ? "Ajouter un livre" : "Editer : ".$book['title'] ; ?></h1>
            </div>
        </div>
      <form action="./<?php echo isset ($book) ? '?id='.$book ['id']: ''; ?>" method="post">
        <div class="row text-info">
          <div class="col-md-6 bg-dark">
              <div class="form-group">
                <label for="title">Titre du livre</label>
                <input name="title" value="<?php echo isset($book) ? $book['title'] :''; ?>" maxlength="30"type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="titre du livre...">
                <small id="titleHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                 <label for="author">Auteur</label>
                   <select name="author_id" class="form-control" id="author_id">
                     <?php foreach ($authors as $author) { ?>
                         <?php if (isset($book) && $book['author_id'] == $author['id']) { ?>
                          <option selected="selected" value="<?php echo $author['id']; ?>">
                            <?php echo $author['name']; ?>
                          </option>
                        <?php } else { ?>
                          <option value="<?php echo $author['id']; ?>">
                            <?php echo $author['name']; ?>
                           </option>
                        <?php } ?>
                    <?php } ?>
                   </select>
              </div>
              <div class="form-group">
                <label for="description"> Description du livre</label>
                <textarea name="description" value="<?php echo isset($book) ? $book['description'] :''; ?>"class="form-control" id="description" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="page">Nombre de pages</label>
                <input name="page" value="<?php echo isset($book) ? $book['pages'] :''; ?>" type="number" step="1" min="0" class="form-control" id="page">
              </div>
          </div>
            <div class="col-md-6 bg-dark">
                <div class="form-group">
                  <label for="wikipedia_link">Lien wikipedia</label>
                  <input name="wikipedia_link" value="<?php echo isset($book) ? $book['wikipedia_link'] :''; ?>" type="text" min="1" class="form-control" id="wikipedia_link">
                </div>
                <div class="form-group">
                  <label for="language">langue</label>
                  <input name="language" value="<?php echo isset($book) ? $book['language'] :''; ?>" type="text" min="1" class="form-control" id="language">
                </div>
                <div class="form-group">
                  <label for="country">Pays</label>
                  <input name="country" value="<?php echo isset($book) ? $book['country'] :''; ?>"type="text" min="1" class="form-control" id="country">
                </div>
                <div class="form-group">
                  <label for="year">Année de parution</label>
                  <input name="year" value="<?php echo isset($book) ? $book['year'] :''; ?>"type="number" min="1" class="form-control" id="year">
                </div>
            </div>
                <div class="gr col-md-12 bg-dark">
                    <input type="hidden" value="<?php echo isset ($book) ? $book ['id'] : ''; ?>" name="id">
                    <button name="book" type="submit" class="btn btn-info btn-lg btn-block">Envoyer</button>
                </div>
            </div>
      </form>
    </div>
  </body>
</html>
