<?php

session_start();
if (!isset($_SESSION['id'])) {
header('location: ./');

}

 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <title>AAAAAAAAAHHHH</title>
     </head>
     <body>
         <div class="container">
             <div class="row text-center">
                 <div class="col-md-7 mx-auto">
                     <div class="card bg-dark">
                         <div class="title text-info">
                             id : <?php echo $_SESSION['id']; ?>
                             nom : <?php echo $_SESSION['name']; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </body>
 </html>
