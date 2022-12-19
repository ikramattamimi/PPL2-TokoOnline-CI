<!DOCTYPE html>
<html lang="en">

<head>
  <title>Zay Shop eCommerce HTML CSS Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.ico') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/templatemo.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">

  <!-- Load fonts style after rendering the layout styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.min.css') ?>">
  <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
  <!-- Start Top Nav -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
      <div class="w-100 d-flex justify-content-between">
        <div>
          <i class="fa fa-envelope mx-2"></i>
          <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
          <i class="fa fa-phone mx-2"></i>
          <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
        </div>
        <div>
          <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
          <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
          <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
          <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Close Top Nav -->

  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-4 justify-content-center">
      <h1 class="my-5">Login Pegawai</h1>

      <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo session()->getFlashdata('error'); ?>
        </div>
      <?php endif; ?>
      <form method="post" action="<?= base_url(); ?>/login/process">
        <?= csrf_field(); ?>
        <form>
          <!-- Email input -->
          <div class="form-floating mb-4">
            <input type="text" id="form2Example1" name="username" class="form-control" placeholder="placeholder" />
            <label class="form-label" for="form2Example1">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-floating mb-4">
            <input type="password" id="form2Example2" name="password" class="form-control" placeholder="placeholder" />
            <label class="form-label" for="form2Example2">Password</label>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        </form>
    </div>
  </div>
  <!-- Start Script -->
  <script src="<?= base_url('assets/js/jquery-1.11.0.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery-migrate-1.2.1.min.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/templatemo.js') ?>"></script>
  <script src="<?= base_url('assets/js/custom.js') ?>"></script>
  <!-- End Script -->
</body>

</html>