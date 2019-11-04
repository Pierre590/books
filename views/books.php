<?php $title = "Liste des livres"; ?> 
<?php ob_start(); ?>


<div class="container">   
    <h1>liste des livres</h1>
    <div class="row align-items-end">
        <?php foreach ($books as $book) { ?>
            <div class="col-md-4">
                <div class="card text-center">
                    <img src= "<?php echo $book['imageLink'] ?>" alt="" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['title']; ?></h5>
                        <a href="<?php echo $book['link']?>" alt="" class="btn btn-success">Wikipedia</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php $content = ob_get_clean();  
// entre obstart et obget clean = memoire tampon, mettre le html dedans?>
<?php require ('public/index.php'); ?>
