<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">Aldrey Safwa</a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
           <li><a href="<?=base_url()?>home">Home</a></li>
           <li><a href="<?=base_url()?>contact">Contact</a></li>
           <li><a href="<?=base_url()?>about">About</a></li>
           <li><a href="<?php echo site_url()?>Artikel_Controller/">News</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Aldrey Safwa</a></li>
        </ul>
    </div>
</nav>
<div class="container">

<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong>News</strong></h3>
    </div>
    <a href="<?php echo base_url().'Artikel_Controller/insert_news'?>" class="btn btn-danger">Add News</a>
  
  <div class="row">
      <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($data -> result_array() as $i) :
          $id       = $i['id'];
          $judul    = $i['title'];
          $author   = $i['author'];
          $content  = $i['content'];
          $datepost = $i['datepost'];
          $image    = $i['image'];
        
      ?>
    <div class="col-sm-6 col-md-3"><br>
      <div class="thumbnail">
        <img src="<?php echo base_url().'assets/img/'.$image;?>" alt="Gambar" width="150px" height="150px">
        <div class="caption">
          <h3><?php echo $judul; ?></h3>
          <p>
            <?php echo limit_words($content,20);?> <br>
            <a href="<?php echo base_url().'Artikel_Controller/view/'.$id;?>">Selengkapnya ...</a>
          </p>
          <p><a href="<?php echo site_url('Artikel_Controller/edit_news/'.$i['id'])?>" class="btn btn-primary" role="button">Edit</a> <a href="<?php echo site_url('Artikel_Controller/delete_news/'.$i['id']) ?>" class="btn btn-default" role="button">Hapus</a></p>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>

</section>
</div>
</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>