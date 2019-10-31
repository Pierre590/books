<?php $title = "Liste des livres"; ?> 
<?php ob_start(); ?>













<h1>liste des livres</h1>
<p>Bienvenue sur la page de la liste des livres</p>

<ul>
    <?php
    foreach ($books as $book) {
        // code
        ?>
        <li><?php echo $book['title']; ?></li>
        <?php
    }
    ?>
</ul>




<pre>
<?php var_dump($books);?>
</pre>

<?php $content = ob_get_clean();  
// entre obstart et obget clean = memoire tampon, mettre le html dedans?>
<?php require ('public/index.php'); ?>
