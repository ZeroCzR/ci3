<div class="container">
    	<?php 
        echo form_open_multipart('User_Controller/register_user', 
          array(
            'class' => 'b_validation',
            'novalidate' => ''));
      ?>
      <div class="col-sm-9">
       <h4><small>NEW REGISTER USER HERE</small></h4>
       <hr>
        <?php
          if(validation_errors()){
            echo "<div class='alert alert-danger'>
                <strong>Upss!</strong>".validation_errors()."
                </div>"
                ;
          }
        ?>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama_user" value="<?php echo set_value('nama_user') ?>" required>
          <div class="invalid-feedback">Please Fill The Name!</div>
        </div>
        <div class="form-group">
          <label>Kode Pos</label>
          <input type="text" class="form-control" name="kode_pos" value="<?php echo set_value('kode_pos') ?>" required>
          <div class="invalid-feedback">Please Fill The Post Code!</div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" name="email" value="<?php echo set_value('email') ?>" required>
          <div class="invalid-feedback">Please Fill The Email!</div>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" required>
          <div class="invalid-feedback">Please Fill The Username!</div>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" required>
          <div class="invalid-feedback">Please Fill The Password!</div>
        </div>
        <div class="form-group">
          <label>Konfirmasi Password</label>
          <input type="password" class="form-control" name="password2" required>
          <div class="invalid-feedback">Please Fill The Confirm Password!</div>
        </div>
        <div class="form-group">
          <label for="">Pilih Paket Membership</label>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="membership" id="premiummembership" value="4" checked>
              <label class="form-check-label" for="premiummembership">Premium Membership</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="membership" id="freemembership" value="5">
              <label class="form-check-label" for="freemembership">Free Membership</label>
          </div>
        </div>
        <input type="submit" id="submitBtn" class="btn btn-primary" value="Register"><hr>
      </div>
    </div>

    <script>
      (function() {
       'use strict';
       window.addEventListener('load', function() {
         var forms = document.getElementsByClassName('b_validation');
         var validation = Array.prototype.filter.call(forms, function(form) {
           form.addEventListener('submitBtn', function(event) {
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

</body>
</html>