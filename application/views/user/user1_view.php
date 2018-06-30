<div class="container">
   <div class="py-5 text-center">
   		<h2>Hi, <?php echo $user->nama_user; ?>
       <span class="badge badge-primary">
       		<?php echo $user->nama_level; ?>
       </span>
       </h2><br><br>
   		<div class="row">
   			<div class="col-sm"></div>
   			<div class="col-sm">
   				<a href="<?php echo base_url().'Artikel_Controller/insert_news'?>">
	   				<img src="../assets/img/icon/2.png" class="img-fluid"> <br><br>
		   			<h4>Create News</h4>
	   			</a>
   			</div>
	   		<div class="col-sm">
	   			<a href="<?php echo base_url().'Kategori_Controller/'?>">
	   				<img src="../assets/img/icon/1.png" class="img-fluid"> <br><br>
	   				<h4>Category Data</h4>
	   			</a>
	   		</div>  
	   		<div class="col-sm"></div>
	    </div>
   </div>
</div>
