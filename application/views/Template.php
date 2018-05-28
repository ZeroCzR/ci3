<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Code Igniter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/validation.js"></script>

  <!-- Data Tables -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Aldrey Safwa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url()?>Welcome/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>About_Controller/">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>Artikel_Controller/">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>Kategori_Controller/">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>Datatable_Controller/">DataTables</a>
        </li>
      </ul>
      <?php if(!$this->session->userdata('logged_in')) : ?>
        <div class="btn-group" role="group" aria-label="Data baru">
          <?php echo anchor('User_Controller/register_user', 'Register', array('class' => 'btn btn-outline-dark')); ?>
          <?php echo anchor('User_Controller/login_user', 'Login', array('class' => 'btn btn-outline-dark')); ?>
        </div>
      <?php endif; ?>

      <?php if($this->session->userdata('logged_in')) : ?>
        <div class="btn-group" role="group" aria-label="Data baru">
          <?php echo anchor('Artikel_Controller/insert_news', 'Artikel Baru', array('class' => 'btn btn-outline-dark')); ?>
          <?php echo anchor('Kategori_Controller/create', 'Kategori Baru', array('class' => 'btn btn-outline-dark')); ?>
          <?php echo anchor('User_Controller/logout', 'Logout', array('class' => 'btn btn-outline-dark')); ?>
        </div>
      <?php endif; ?>
    </div>
  </nav>

  <?php if($this->session->flashdata('user_registered')): ?>
      <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('login_failed')): ?>
      <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('login_failed').'</div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
      <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</div>'; ?>
    <?php endif; ?>

<div class="container">

</div>

</body>
</html>