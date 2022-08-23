<?php require 'include/logvalidation.php'; 

if (isset($_GET['delete'])) {
    $id = $_GET['info'];
    $con->query("DELETE FROM shop_cat WHERE id=$id") or die($con->error());   
}

?>
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
                  <i class="mdi mdi-cart"></i>
                </span> Shopping Categories </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class=" shadow" aria-current="page">
                    <a href="addcat.php" title="Add Product" class="btn btn-gradient-primary" data-toggle="modal" data-target="#modalAddForm">Add New Categories <i class="mdi mdi-cart mdi-18px align-middle ml-1"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header text-center">
							<h4 class="modal-title w-100 font-weight-bold">Add New Category</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="container modal-body mx-3">
							<form class="form-sample needs-validation" method="POST" action="dbcon/addcat.php" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
								<div class="col-md-12">
				                    <div class="form-group row">
				                        <label for="designation" class="col-form-label">Name</label>
				                        <div class="col-sm">
				                        <input type="text" class="form-control border-secondary" id="designation" placeholder="Enter designation" name="name" required/>
				                        </div>
				                    </div>
				                </div>
								<div class="col-md-12">
				                    <div class="form-group row">
			                            <label class="col-form-label">Parent <sup>this categorie will be subcategorie of parent</sup></label>
			                            <div class="col-sm"> 
			                              <select name="parent" class="form-control border-secondary">
			                              	<option value="hidden">Select Parent</option>
			                              	<option value="hidden">No Parent</option>
			                              	<?php 
			                              	require "dbcon/dbconnect.php";
			                              	$result = $con->query("SELECT * FROM shop_cat ORDER BY id ") or die($mysqli->error);
			                              	while ($row = $result->fetch_assoc()): ?> 
			                              	<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			                              <?php endwhile; ?>
			                              </select>
			                            </div>
				                    </div>
				                </div>
		                      	<div class="form-group ml-1 text-center">
		                        	<button type="submit" class="btn btn-gradient-info btn-icon-text" name="submit" id="submitbtnn"><i class="mdi mdi-account-multiple-plus btn-icon-prepend"></i> Add </button>
		                      	</div>
					        </form>
				      	</div>
				    </div>
				</div>
			</div>


           <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Parent</th>                    
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


<?php 
  $result = $con->query("SELECT * FROM shop_cat ORDER BY id ") or die($mysqli->error);
  $id = 0;
  while ($row = $result->fetch_assoc()): 
  $id++;
?>
                        <tr>
                          <td><?php echo $id; ?></td>
                          <td> <?php echo $row['name']; ?> </td>
<?php 
 $subid = $row['for_id'];
 $getp = $con->query("SELECT * FROM shop_cat where id = $subid") or die($mysqli->error);
 $sub = $getp->fetch_assoc()
?>

                          <td> <?php echo $sub['name']; ?> </td>
                          <td>
                          <form action="cat.php" method="GET" accept-charset="utf-8">
                            <input type="hidden" name="info" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-gradient-danger" name="delete"> Delete </button>
                          </form> 
                          </td>
                        </tr>

<?php endwhile; ?>
                      </tbody>
                    </table>
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