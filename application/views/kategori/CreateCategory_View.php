<div class="container">

<section id="contact">
  <div class="container">
    <?php 
      echo form_open_multipart('Kategori_Controller/create', array(
            'class' => 'b_validation',
            'novalidate' => ''));
    ?>
    <div class="well well-sm">
      <h3><strong>Add Category</strong></h3>
    </div>
      <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" required>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" required>
        <div class="invalid-feedback">Please Fill In The Blank!</div>
      </div>
      <div class="form-group">
        <input type="submit" id="submitBtn" class="btn btn-primary" value="Tambahkan">
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