
<?php $title = "Liste des livres"; ?> 

<?php ob_start(); ?>

<style>
.card-image {
    display: flex;
    align-items: center; /* vertical */
    justify-content: center; /*horizontal */
    height: 240px;
}

.card-image img {
    width: 100%;
    height: 100%;
}
.btn {
    margin: 8px;
}
.card-title {
    font-size: 1.7em;
    font-family: Cursive;
}
</style>

<div class="container"> 
    <div class="text-white"><h1>liste des livres</h1></div>
    <div class="row">
        <?php foreach ($books as $book) { ?>
            <div class="col-md-3 mt-5">
                <div class="card text-center h-100" style="">
                    <div class="card-image">
                        <img src= "<?php echo $book['imageLink'] ?>" alt= >
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['title']; ?></h5>
                        <p class="card-text"><strong>Auteur : </strong><?php echo $book['author']; ?> </p>
                    </div>       
                        <div class="card-footer text-center">
                            <a href="?action=book&id=<?php echo $book['id']; ?>" alt="" class="btn btn-info">Détails</a>
                        </div>
                </div> 
            </div>
        <?php } ?>
    </div>
</div>

<?php $content = ob_get_clean();  ?>
<?php require ('public/index.php'); ?>
