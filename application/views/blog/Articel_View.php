<div class="container">

<section id="contact">
  <div class="container">
    <br>
    <a href="<?php echo base_url().'Artikel_Controller/insert_news'?>" class="btn btn-danger">Add News</a>
  
  <div class="row">
      <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($all_news -> result_array() as $i) :
          $id       = $i['id'];
          $judul    = $i['title'];
          $author   = $i['author'];
          $content  = $i['content'];
          $datepost = $i['datepost'];
          $image    = $i['image'];
        
      ?>
    <div class="col-sm-4"><br>
      <div class="card mb-6" style="width: 20rem;">
        <img class="card-img-top" src="<?php echo base_url().'assets/img/'.$image;?>" alt="Gambar">
        <div class="card-body">
          <h4 class="card-title"><?php echo $judul; ?></h4><hr>
          <p class="card-text">
            <?php echo limit_words($content,20);?> <br>
            <a href="<?php echo base_url().'Artikel_Controller/view/'.$id;?>">Selengkapnya ...</a>
          </p><hr>
          <p><a href="<?php echo site_url('Artikel_Controller/edit_news/'.$i['id'])?>" class="btn btn-primary" role="button">Edit</a> <a href="<?php echo site_url('Artikel_Controller/delete_news/'.$i['id']) ?>" class="btn btn-default" role="button">Hapus</a></p>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <div class="container" align="center">
      <?php echo $links; ?>
    </div>

</section>
</div>
</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>