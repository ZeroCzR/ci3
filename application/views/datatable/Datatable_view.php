<script type="text/javascript">
   $(document).ready(function() {
        $('#table_id').DataTable();
    } );
 </script>

<div class="container">

<section id="contact">
  <div class="container">
    <br>
    <a href="<?php echo base_url().'Artikel_Controller/insert_news'?>" class="btn btn-danger">Add News</a>
    <br>
  <div class="row">
      <table id="table_id" class="table table-striped"><br>
        <thead class="thead-dark"><br>
          <tr>
            <th>News ID</th>
            <th>Category ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Date Post</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
      <tbody>
        <?php
          function limit_words($string, $word_limit){
            $words = explode(" ", $string);
            return implode(" ", array_splice($words, 0, $word_limit));
          }

          foreach ($data -> result_array() as $i) :
            $id       = $i['id'];
            $idctg    = $i['id_kategori'];
            $title   = $i['title'];
            $author    = $i['author'];
            $content  = $i['content'];
            $datepost = $i['datepost'];
            $image    = $i['image'];
            $Status   = $i['status'];
        ?>
        <tr>
          <td><?php echo $id ?></td>
          <td><?php echo $idctg ?></td>
          <td><?php echo $title ?></td>
          <td><?php echo $author ?></td>
          <td><?php echo limit_words($content, 5);?> ...</td>
          <td><?php echo $datepost ?></td>
          <td><img class="img-rounded" src="<?php echo base_url().'assets/img/'.$image;?>" height="50px" width="50px"></td>
          <td><?php echo $Status ?></td>
          <td>
            <div class="btn-group">
              <a href="<?php echo site_url('Artikel_Controller/edit_news/'.$i['id'])?>" class="btn btn-primary" role="button">Edit</a> 
              <a href="<?php echo site_url('Artikel_Controller/delete_news/'.$i['id']) ?>" class="btn btn-danger" role="button">Hapus</a>
            </div>
          </td>
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>
    
  </div>

</section>
</div>