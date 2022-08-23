<?php require 'include/logvalidation.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin - Stylish Look</title>
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->

<?php require'include/metalinks.php' ?>

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

              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin Panel Users</h4>
                    <form class="form-sample needs-validation" method="POST" action="dbcon/addadminuser.php" enctype="multipart/form-data" accept-charset="utf-8" validate>
                     <p class="card-description"> Personal info </p>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="designation" class="col-sm-3 col-form-label">Designation</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control border-secondary" id="designation" placeholder="Enter designation" name="desi" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control border-secondary" placeholder="Enter first name" name="fn" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control border-secondary" placeholder="Enter last name" name="ln" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control border-secondary" name="gen" required>
                                <option hidden>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Transgender</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Age</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control border-secondary" placeholder="Enter age" name="age" pattern="[0-9]{2}" min="18" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone no.</label>
                            <div class="col-sm-9">
                              <input type="tel" class="form-control border-secondary" placeholder="Enter phone number" name="pn" pattern="[0-9]{10}" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control border-secondary" placeholder="Enter email" name="mail" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+)*$/" size="30" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="upload" class="col-sm-3 col-form-label">File upload</label>
                            <div class="col-sm-9">
                              <input type="file" name="img" class="file-upload-default" autocomplete="off" required/>
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control border-secondary file-upload-info" disabled placeholder="Upload Image" required/>
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                              </span>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div id="showErrorp1" class="form-control border-light font-weight-bold text-center">
                            </div>
                        </div>
<!--                    <div class="custom-file col-sm-10">
                          <input type="file" autocomplete="off" class=" custom-file-input border-secondary" id="customFile" required>
                          <label class="rounded-0 mr-4 pt-2 custom-file-label" for="customFile">Choose Image</label>
                        </div>
                        <script>
                          bsCustomFileInput.init()
                          var btn = document.getElementById('btnResetForm')
                          var form = document.querySelector('form')
                          btn.addEventListener('click', function () {
                            form.reset()
                          })
                        </script> -->
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="p1" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control border-secondary" placeholder="Enter Password" id="p1" name="p1" autocomplete="off" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="p2" class="col-sm-3 col-form-label">Re-Enter Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control border-secondary" placeholder="Re-Enter Password" id="p2" name="p2" autocomplete="off" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="showErrorp1"></div> 
                      <script src="assets/js/jquery-3.4.1.min.js"></script>
                      <script>
                        $(document).ready(function(){ 
                          $('#p2').keyup(function(){
                            var p1 = $('#p1').val();
                            var p2 = $('#p2').val();

                            if (p2!=p1||p1!=p2) {
                              $('#showErrorp1').html('**Password does not match.');
                              $('#showErrorp1').css('color','red');
                              
                              $('#submitbtnn').attr("disabled",true);
                              return false;
                            }
                            else {
                              $('#showErrorp1').html('**Password matched.');
                              $('#showErrorp1').css('color','#28A745');
                              $('#submitbtnn').attr("disabled",false);
                              return true;
                            }
                          });
                          $('#p1').keyup(function(){
                            var p1 = $('#p1').val();
                            var p2 = $('#p2').val();
                            if (p2!=p1||p1!=p2) {
                              $('#showErrorp1').html('**Password does not match.');
                              $('#showErrorp1').css('color','red');
                              
                              $('#submitbtnn').attr("disabled",true);
                              return false;
                            }
                            else {
                              $('#showErrorp1').html('**Password matched.');
                              $('#showErrorp1').css('color','#28A745');
                              $('#submitbtnn').attr("disabled",false);
                              return true;
                            }
                          });
                        });
                        </script>
                      <div class="form-group ml-1 float-left">
                        <button type="submit" class="btn btn-gradient-primary btn-icon-text" name="submit" id="submitbtnn"><i class="mdi mdi-account-multiple-plus btn-icon-prepend"></i> Submit </button>
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