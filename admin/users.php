<?php require 'include/logvalidation.php'; 



if (isset($_GET['delete'])) {
    $id = $_GET['info'];
    $con->query("DELETE FROM admin_users WHERE id=$id") or die($con->error());   
}

?>


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

            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account-multiple"></i>
                </span> Admin Panel Handler</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class=" shadow" aria-current="page">
                    <a href="adduser.php" title="Add Product" class="btn btn-gradient-primary"><i class="mdi mdi-account-plus text-center mdi-18px align-middle"></i> Add New User 
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Email</th>
                          <th>Last Login</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

<?php 
  $result = $con->query("SELECT * FROM admin_users ORDER BY id ") or die($mysqli->error);
  $id = 0;
  while ($row = $result->fetch_assoc()): 
  $id++;
?>
                        <tr>
                          <td><?php echo $id; ?></td>
                        
                          <td> <?php echo $row['fname']." ".$row['lname']; ?> </td>
                          <td> <?php echo $row['designation']; ?> </td>
                          <td> <?php echo $row['email']; ?> </td>
                          <td> <?php echo $row['lastlogin']; ?> </td>
                          <td>
                          <form action="users.php" method="GET" accept-charset="utf-8">
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