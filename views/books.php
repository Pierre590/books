<?php $title = "Liste des livres"; ?> 
<?php ob_start(); ?>
<h1>liste des livres</h1>
<p>Bienvenue sur la page de la liste des livres</p>
<?php $content = ob_get_clean();  
// entre obstart et obget clean = memoire tampon, mettre le html dedans?>
<?php require ('public/index.php'); ?>
