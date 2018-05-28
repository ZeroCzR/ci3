<div class="container">

<section id="contact">
  <div class="container">
    <?php 
      echo form_open_multipart('Artikel_Controller/edit_news/'.$show_article['id'], array(
            'class' => 'b_validation',
            'novalidate' => ''));
    ?>
    <div class="well well-sm">
      <h3><strong>Edit News</strong></h3>
    </div>
      <div class="form-group">
        <label>ID Kategori</label>
        <?php echo form_dropdown('id_kategori', $kategori, set_value('id_kategori'), 'class="form-control" required' ); ?>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" value="<?php echo $show_article['title']?>" name="title" required>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" value="<?php echo $show_article['author']?>" name="author" required>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" style="height:300px;" required>
          <?php echo $show_article['content']?>
        </textarea>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <label>You can upload file by type: .jpg .jpeg .png</label>
        <input type="file" name="image" required>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <input type="submit" id="submitBtn" class="btn btn-primary" value="Posting"><hr>
      </div>
        <?php
          if(validation_errors()){
            echo "<div class='alert alert-danger'>
                <strong>Danger!</strong>".validation_errors()."
                </div>"
                ;
          }
        ?>
  </div>
  <script>
      (function() {
       'use strict';
       window.addEventListener('load', function() {
         var forms = document.getElementsByClassName('b_validation');
         var validation = Array.prototype.filter.call(forms, function(form) {
           form.addEventListener('submit', function(event) {
             if (form.checkValidity() === false) {
               event.preventDefault();
               event.stopPropagation();
             }
             form.classList.add('was-validated');
           }, false);
         });
       }, false);
      })();
    </script>
</section>
</div>
