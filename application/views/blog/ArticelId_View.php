<div class="container">
  <section id="contact">
    <div class="container">  
      <div class="col-xs-12 col-sm-9 col-md-9">
        <div class="well well-sm">
            <center><h2><?php echo $data['title']?></h2></center><hr>
            <p align="left"><b>Datepost : <?php echo $data['datepost'] ?></b></p>
            <p align="right"><b>Posting by : <?php echo $data['author']?></b></p>
            <hr>
            <center>
              <img src="<?php echo base_url().'assets/img/'.$data['image'];?>" width="200px" height="200px">
            </center>
            <br>
            <p>
              <?php echo $data['content']; ?>
            </p>
        </div>
      </div>
    </div>
  </section>
</div>

</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>