<?php

$db = new PDO ('mysql:host=localhost;dbname=books','root');

session_start();

$_session ['id'] = '' ;
$_session ['name'] = '' ;
$_session ['password'] = '' ;
$_session ['email'] = '' ;
$_session ['pseudo'] = '' ;



if (isset($_POST ['email'])) {

    $login =(string) $_POST['email'];
    $password =(string) $_POST['password'];

    if (filter_var($login,FILTER_VALIDATE_EMAIL) && $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        /*var_dump = password_verfiy ($password,PASSWORD_DEFAULT));*/
        $stmt = $db->prepare('SELECT * FROM users WHERE email = :toto');
        $stmt-> bindParam(':toto', $login, PDO::PARAM_STR);
        $stmt->execute();


        $user = $stmt->fetch();

        var_dump($user);
    }


}



 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <div class="container bg-dark" style="margin-top: 10em">
            <form class="" action="./" method="post">
                <div class="row">
                    <div class="col-md-12 text-info">
                        <div class="title text-center text-info">
                            <h1>Connecte te ichi..</h1>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse email</label>
                            <input required type="email" name="email" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Entre votre email">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input required type="password" name="password" class="form-control" id="password" placeholder="Entrer votre mot de passe">
                          </div>
                          <button type="submit" class="btn btn-info btn-lg btn-block">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

<?php


session_destroy();
?>
