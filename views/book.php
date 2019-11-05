<?php $title = "Liste des livres"; ?> 
<?php ob_start(); ?>


<div class="card text-white bg-info mb-3" style="">
  <div class="row no-gutters">
    <div class="col-md-4">
        <img src= "<?php echo $book['imageLink'] ?>" alt= >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $book['title']; ?></h5>
        <p class="card-text"><strong>Pays : </strong><?php echo $book['country']; ?> </p>
        <p class="card-text"><strong>Nombre de pages : </strong><?php echo $book['pages']?> </p>
        <a href="<?php echo $book['link']?>"target="_blank" alt="" class="btn btn-success">Wikipedia</a> 
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean();  ?>
<?php require ('public/index.php'); ?>