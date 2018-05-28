<div class="container">

<section id="contact">
  <div class="container"><br>
    <a href="<?php echo base_url().'Kategori_Controller/create'?>" class="btn btn-danger">Add Category</a>
  
  <div class="row">
      <?php foreach ($kategori as $key) :?>
    <div class="col-sm-6"><br>
      <div class="card mb-6" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title"><?php echo $key->nama_kategori ?></h4><hr>
          <p class="card-text">
            <?php echo $key->deskripsi ?> <br>
          </p><hr>
          <p>
            <a href="<?php echo base_url(). 'Kategori_Controller/edit/' . $key->id_kategori ?>" class="btn btn-primary">Edit</a>
            <a href="<?php echo base_url() ?>Kategori_Controller/delete/<?php echo $key->id_kategori ?>" class="btn btn-danger">Delete</a>
          </p>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>

</section>
</div>
</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>