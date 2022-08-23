<?php 
  require 'include/logvalidation.php'; 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Add Product</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
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
                  <i class="mdi mdi-shape-rectangle-plus"></i>
                </span> Add New Product </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class=" shadow" aria-current="page">
                    <a href="#" title="Add Product" class="btn btn-gradient-primary">View All Product <i class="mdi mdi-shopping align-middle ml-1"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New Product Info</h4>
                    <form class="form needs-validation mt-5" method="POST" action="dbcon/addprod.php" enctype="multipart/form-data" accept-charset="utf-8" validate>
                        <div class="form-group">
                          <label for="code" class="">Product Code</label>
                            <input type="text" class="form-control border-secondary col-lg-6" id="designation" placeholder="Enter product code" name="code" required>
                        </div>
                          <div class="form-group">
                            <label for="title" class="">Product Title</label>
                              <input type="text" class="form-control border-secondary" placeholder="Enter product title" name="title" autocomplete="off" required> 
                          </div>
                        <div class="form-group">
                          <label for="desc" class="">Description</label>
                            <textarea name="desc" class="ckeditor form-control border-secondary" placeholder="Enter description" rows="5" required></textarea>
                        </div>
                        <div class="form-group mb-3 row">
                          <label for="price" class="col-sm-2 col-form-label"> Price </label>
                          <div class="col-sm-5">
                            <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text bg-gradient-primary border-secondary text-white "> ₹ </span>
                            </div>
                            <input type="number" class="form-control border-secondary file-upload-info" name="price" aria-label="Amount (to the nearest rupee)" placeholder="Enter our offered price" pattern="[0-9]" min="1" required>
                            <div class="input-group-append">
                              <span class="input-group-text border-secondary">.00</span>
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="form-group mb-3 row">
                          <label for="oldprice" class="col-sm-2 col-form-label">Old Price</label>
                          <div class="col-sm-5">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary border-secondary text-white"> ₹ </span>
                              </div>
                              <input type="number" class="form-control border-secondary file-upload-info"  aria-label="Amount (to the nearest rupee)" name="oldprice" placeholder="Enter old price" pattern="[0-9]" min="1" required>
                              <div class="input-group-append">
                                <span class="input-group-text border-secondary">.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
<?php 
  $result = $con->query("SELECT * FROM shop_cat ORDER BY id ") or die($mysqli->error);
?>
                        <div class="form-group mb-3 row">
                          <label for="cat" class="col-sm-2 col-form-label">Category</label>
                          <div class="col-sm-5">
                            <select name="cat" class="form-control border-secondary rounded-sm" required>
                              <option value="">Select Category</option>
                              <?php while ($row = $result->fetch_assoc()): ?>
                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                              <?php endwhile; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group mb-3 row">
                          <label for="quan" class="col-sm-2 col-form-label">Quantity</label>
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="col-sm-5">
                                <input type="number" id="ibox" class="form-control border-secondary" placeholder="Enter quantity" name="quan" required>
                              </div>
                              <div class="form-check form-check-success ml-3">
                                <label class="form-check-label">
                                  <input type="checkbox" value="unlimited" name="unquan" class="form-check-input" pattern="[0-9]" min="1" id="myCheck" onclick="myFunction()" /> Unlimited Quantity </label>
                              </div>
                            </div>
                          </div>
                        </div>
                          <script>
                            function myFunction(){
                              var checkBox = document.getElementById("myCheck");
                               

                              if(checkBox.checked == true){
                                // window.location.href='sagar';
                                document.getElementById("ibox").disabled = true;
                                document.getElementById("ibox").value = '';
                               }
                              else{
                                 document.getElementById("ibox").disabled = false;
                                }
                            }

                          </script>
                        <div class="form-group mb-0 row">
                          <label for="pic" class="col-sm-2 col-form-label">Product Cover Picture</label>
                          <div class="col-sm-5">
                            <input type="file" name="pic" class="file-upload-default" autocomplete="off" required>
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control border-secondary file-upload-info" disabled placeholder="Upload Image" name="cpic" required>
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                          </div>
                          </div>
                        </div>
                        <div class="form-group mb-3 row">
                          <label for="mpic" class="col-sm-2 col-form-label">Product More Picture</label>
                          <div class="col-sm-5">
                            <input type="file" name="mpic" class="file-upload-default" autocomplete="off" multiple>
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control border-secondary file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                          </div>
                          </div>
                        </div>
                      <div class="form-group ml-1 float-left">
                        <button type="submit" class="btn btn-gradient-primary btn-icon-text" name="submit" id="submitbtnn"><i class="mdi mdi-account-multiple-plus btn-icon-prepend"></i> Add </button>
                      </div>
                    </form>
                  </div>
                </div>
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