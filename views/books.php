
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

.pagination{
    margin: 20px;

}


</style>

<div class="container">
    <div class="text-white"><h1>liste des livres</h1></div>
    <div class="row">
        <?php foreach ($books as $book) { ?>
            <div class="col-md-6 mt-5 col-lg-3">
                <div class="card text-center h-100" style="">
                    <div class="card-image">
                        <img src= "<?php echo $book['image'] ?>" alt= >
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['title']; ?></h5>
                        <p class="card-text"><strong>Auteur : </strong><?php echo $book['author'] ? $book['author'] : 'Unknown'; ?> </p>
                    </div>
                        <div class="card-footer text-center">
                            <a href="?action=book&id=<?php echo $book['id']; ?>" alt="" class="btn btn-info">Détails</a>
                        </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
                    <?php for($i=1;$i<=$nbpage;$i++){
                        if ($i == $page){
                            echo "<li class='page-item disabled'><a class='page-link' href='#'>".$i."</a></li>";
                        }
                        else {
                            echo "<li class='page-item'><a class='page-link' href='?action=books&page=".$i."'>".$i."</a></li>";
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();  ?>
<?php require ('public/index.php'); ?>
