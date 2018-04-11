<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title?></title>
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
           <li <?php if($title=="Home"){ echo "class='active'"; }?>><a href="<?=base_url()?>home">Home</a></li>
          <li <?php if($title=="Contact"){ echo "class='active'"; }?>><a href="<?=base_url()?>contact">Contact</a></li>
           <li <?php if($title=="About"){ echo "class='active'"; }?>><a href="<?=base_url()?>about">About</a></li>
          <li <?php if($title=="News"){ echo "class='active'"; }?>><a href="<?=base_url()?>news">News</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Aldrey Safwa</a></li>
        </ul>
    </div>
</nav>
<div class="container">
  <?php if($content!=null){ include $content;}?>
</div>

<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong>News</strong></h3>
    </div>
  
  <div class="row">
    <div class="col-sm-6 col-md-3">
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
      <div class="thumbnail">
        <img src="<?php echo base_url().'assets/img/'.$image;?>" alt="...">
        <div class="caption">
          <h3><?php echo $judul; ?></h3>
          <p>
            <?php echo limit_words($content,20);?> <br>
            <a href="<?php echo base_url().'Artikel_Model/view/'.$id;?>">Selengkapnya ...</a>
          </p>
          <p><a href="#" class="btn btn-primary" role="button">Edit</a> <a href="#" class="btn btn-default" role="button">Hapus</a></p>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</section>

</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>