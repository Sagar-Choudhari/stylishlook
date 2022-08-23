<?php 

$mysqli = new mysqli('localhost','root','','stylishlook') or die(mysqli_error($mysqli));

    $text = "";
    $timestamp = "";
    $done = "";

    if(isset($_POST['submit'])){
      $text = $_POST['todo'];
      date_default_timezone_set('Asia/Kolkata');  
      $timestamp =   date('Y/m/d H:i:s', time());

    // $sql="INSERT INTO todo (`what`,`dt`) VALUES ('$text','$timestamp')";
    // $res=mysqli_query($con,$sql);

      $mysqli->query("INSERT INTO todo (`what`,`dt`) VALUES ('$text','$timestamp')") or die($mysqli->error);
    }


    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM todo WHERE id=$id") or die($mysqli->error());   
    }

    if(isset($_GET['done']) && ($_GET['done'])!=''){
      $todone = $_GET['done'];
      if ($todone==1) {

        $idd = $_GET['id'];
        $todone = $_GET['done'];

        $mysqli->query("UPDATE `todo` SET `done` = '1' WHERE `todo`.`id` = '$idd'") or die($mysqli->error()); 

      }else{
        $idd = $_GET['id'];
        $mysqli->query("UPDATE `todo` SET `done` = '0' WHERE `todo`.`id` = '$idd'") or die($mysqli->error()); 
      }

      
    }

 ?>




<div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Todo</h4>

                    <form method="POST" accept-charset="utf-8">
                      <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" name="todo" placeholder="What do you need to do today?" autocomplete="off">
                        <button type="submit" name="submit" class="btn btn-gradient-primary font-weight-bold" >Add</button>
                      </div>
                    </form>


<!--==================== disable form resubmission script ===========================-->

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>                 
<?php 
  $result = $mysqli->query("SELECT * FROM todo ORDER BY id ") or die($mysqli->error);
  //pre_r($result);  /// to get record value
?> 



                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">

<?php while ($row = $result->fetch_assoc()): 

  if ($row['done']==1) {
    $done ='completed';
    $checked ='checked';
    $doneno = 0;
  } else{
    $done ='';
    $checked ='';
    $doneno = 1;
  }
  ?>
                        <li class="<?php echo $done; ?>">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input  type="checkbox" id="myCheck<?php echo $row['id']; ?>" onclick="myCheck<?php echo $row['id']; ?>()" <?php echo $checked; ?>/><?php echo $row['what']; ?></label>

                             


                          </div>
                          <a href="?delete=<?php echo $row['id']; ?>" title="Delete" class="remove"><i class="mdi mdi-close-circle-outline"></i></a>
                          
                        </li>

<script>
    function myCheck<?php echo $row['id']; ?>(){
      
      var checkBox = document.getElementById("myCheck<?php echo $row['id']; ?>");
      if(checkBox.checked == true){
        window.location.assign("?done=<?php echo $doneno ?>&id=<?php echo $row['id']; ?>");
      } else {
        window.location.assign("?done=<?php echo $doneno ?>&id=<?php echo $row['id']; ?>");
      }
    }
</script>


<?php endwhile; ?>

                        <!-- <li >
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Call John </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li> -->


                        <!-- <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Create invoice </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li> -->
                        <!-- <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Print Statements </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li> -->
                        <!-- <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li> -->
                        <!-- <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li> -->
                      </ul>
                    </div>
                  </div>
                </div>
              </div>