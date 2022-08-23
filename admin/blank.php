<?php require 'include/logvalidation.php'; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Title</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>

  <body class="animsition">
    <div class="container-scroller">


<?php require('include/header.php'); ?>


      <div class="container-fluid page-body-wrapper">

<!-- partial:partials/_sidebar.html -->
<?php require('include/sidebar.php'); ?>
<!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">


            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class=" shadow" aria-current="page">
                    <a href="#" title="Add Product" class="btn btn-gradient-primary">Add Product <i class="mdi mdi-cart-plus mdi-18px align-middle ml-1"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>








          </div>
          <!-- content-wrapper ends -->
          
          <?php require('include/footer.php'); ?>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php require'include/footerlink.php'; ?>

  </body>
</html>