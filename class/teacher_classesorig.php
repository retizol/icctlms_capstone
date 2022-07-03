<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
ob_start();
?>
<body style="padding-top: 110px">
  <br><br>
<div class="container">
          <div class="row">
              <div class="col-md-12 bg-light">
                <a href="teacher_classes.html" class="text-dark"><small>Class Management</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="teacher_whatsdue.html" class="text-dark"><small>What's Due</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="teacher_progress.html" class="text-dark"><small>Progress</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              </div>
<br>
              <div class="row">
                <div class="col"><h4>My Classes</h4></div>
                <div class="col">
                  <div class="dropdown">
                      <button type="button" class="btn btn-primary dropdown-toggle float-right " data-toggle="dropdown"> + Create</button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" data-toggle="modal" data-target="#createClass" >Create Class</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal2" >Agenda</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal3" >Join Class</a>
                          </div>
                  </div>
                </div>
              </div>
</div>



<div class="container">
      <br>
        <div class="row" >
            <?php
            $sqltcs= mysqli_query($conn, "SELECT * From create_class WHERE teacher_id = '$usrid'");
            $count = mysqli_num_rows($sqltcs);
              if ($count > 0){
              while($rows=mysqli_fetch_assoc($sqltcs)){
                $class_name=$rows['class_name'];
                $class_description=$rows['class_description'];
                $id = $rows['class_id'];  ?>

                <div class="col-md-4 mb-3">
                  <div class="card" style="height: 200px">
                    <div class="card-body">
                      <h6 class="card-title" style="height:30px"><?php echo $rows['class_name']; ?></h6>
                      <p class="card-text"><?php echo $rows['class_description']; ?></p>
                  <a href="my_students.php<?php echo '?id='.$id;?>" class="card-link">Open course</a>
                  <a href="#<?php echo $id; ?>" data-toggle="modal">Remove</a>
                  <!-- Modal -->
              <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                		<div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="myModalLabel">Remove Class</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                </div>
                  <div class="modal-body">
                  <div class="alert alert-danger">
                    Are you sure you want to Remove this class?
                  </div>
                  </div>
                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                  <button id="<?php echo $id; ?>" class="btn btn-danger remove" name="remove">Yes</button>
                </div>
              </div>
            </div>
          </div>
                      <!-- Modal -->
                    </div>
                  </div>
                </div>
            <?php }}?>


            <div class="col-md-4 mb-3" data-toggle="modal" data-target="#createClass">
              <div class="card p-5" style="height: 200px">
                <a class="text-center text-muted"><img src="../images/add.png" alt="" class="w-25 mb-2"><br>Add Class</a>
              </div>
            </div>

        </div>
  </div>
  <!-- =======End of container -->
  <br>

  <div class="container">
    <div class="jumbotron">
      <div class="card">
        <h2>My Classes</h2>
        </div>
        <div class="card">

          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th ></th>
                  <th scope="col">Class Name</th>
                  <th scope="col">Class Description</th>
                  <th colspan="2"></th>
                </tr>
              </thead>
              <tbody>


                <?php
                $sqltcs= mysqli_query($conn, "SELECT * From create_class WHERE teacher_id = '$usrid'");
                $count = mysqli_num_rows($sqltcs);
                  if ($count > 0){
                  while($rows=mysqli_fetch_assoc($sqltcs)){
                    $class_name=$rows['class_name'];
                    $class_description=$rows['class_description'];
                    $id = $rows['class_id'];  ?>
                    <tr id="del<?php echo $id; ?>">
                      <td >
                        <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                      </td>
                      <td ><?php echo $rows['class_name']; ?></td>
                      <td ><?php echo $rows['class_description']; ?></td>

                      <td ><a href="my_students.php<?php echo '?id='.$id;?>" class="btn btn-primary">View Class</a></td>
                    </tr>

                <?php }}?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<!-- =======FOR TESTING PURPOSES -->
<div class="container">
          <div class="jumbotron">
            <div class="card">
              <h2>List of Classes</h2>

            </div>
            <div class="card">
              <div class="card-body">

                          <table class="table">
                            <table class="table">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col"><p class="text-center">#</p></th>
                                  <th scope="col"><p class="text-center">Class Code</p></th>
                                  <th scope="col"><p class="text-center">Class Name</p></th>
                                  <th scope="col"><p class="text-center">Class Description</p></th>
                                  <th scope="col"><p class="text-center">Class Grade</p></th>
                                  <th scope="col"><p class="text-center">Class Subject</p></th>
                                  <th colspan="3"><p class="text-center">Options</p></th>
                                </tr>
                              </thead>
                              <tbody>

   <?php

    $sql="SELECT * from create_class;";
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $class_id=$row['class_id'];
        $class_code=$row['class_code'];
        $class_name=$row['class_name'];
        $class_description=$row['class_description'];
        $class_grade=$row['class_grade'];
        $class_subject=$row['class_subject'];
        echo '<tr>
      <th scope="row">'.$class_id.'</th>
      <td>'.$class_code.'</td>
      <td>'.$class_name.'</td>
      <td>'.$class_description.'</td>
      <td>'.$class_grade.'</td>
      <td>'.$class_subject.'</td>

      <td><button class="btn btn-success"><a href="update_class.php? updateclass_id='.$class_id.'" class="text-light">Edit</a></button></td>
      <td><button class="btn btn-success"><a href="Groups.php" class="text-light">VIEW CLASS</a></button></td>
      <td><button class="btn btn-success"><a href="delete_class.php? deleteclass_id='.$class_id.'" class="text-light">Delete Class</a></button>
    </td>
    </tr>';
}
}
 ?>
                              </tbody>
                            </table>
              </div>
            </div>
          </div>
</div>
<!--end =======FOR TESTING PURPOSES -->


<!-- MODAL CREATE CLASS --><!-- MODAL CREATE CLASS --><!-- MODAL CREATE CLASS -->
<form  method="POST">
<div class="modal" id="createClass">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Class</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <br>


        <!-- Modal body for submitcc-->
        <div class="container">
          <div class="form-group">
          <input type="text" class="form-control" name="class_name" placeholder="Name your Class" >
          </div>
          <div class="form-group">
          <input type="text" class="form-control" name="class_description" placeholder="Describe your class - Max. 260 characters" >
          </div>
          <div class="form-group">
            <select class="form-control" name="class_grade" placeholder="Select a Grade" >
              <option selected>Select a Grade</option>
              <option value="NONE">NONE</option>
              <option value="1ST YEAR">1ST YEAR</option>
              <option value="2ND YEAR">2ND YEAR</option>
              <option value="3RD YEAR">3RD YEAR</option>
              <option value="4TH YEA">4TH YEAR</option>
              <option value="5TH YEAR">5TH YEAR</option>
              <option value="GRADE 11">GRADE 11</option>
              <option value="GRADE 12">GRADE 12</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="class_subject" placeholder="Select Subject" >
              <option selected>Select Subject</option>
              <option value="All">All</option>
              <option value="Computer Technology">Computer Technology</option>
              <option value="Creative Arts">Creative Arts</option>
              <option value="Health and PE">Health and PE</option>
              <option value="Language Arts">Language Arts</option>
              <option value="Mathematics">Mathematics</option>
              <option value="Professional Development">Professional Development</option>
              <option value="Science">Science</option>
              <option value="Social Studies">Social Studies</option>
              <option value="Special Education">Special Education</option>
              <option value="Vocational Studies">Vocational Studies</option>
              <option value="World Languages">World Languages</option>
            </select>
            </div>

          </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="submitcc" class="btn btn-primary">Create</button>
          <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>
  </div>

  </form>

<?php
//This will generate code and insert class to table 'create_class'
//Submit button name = submitcc
function generateRandomString($length = 6) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
  $randstr = generateRandomString(6);


if (isset($_POST['submitcc'])){
    if(!empty( $_POST['class_name']) && !empty( $_POST['class_description']) && !empty( $_POST['class_grade']) && !empty( $_POST['class_subject']) ){
        $class_name = $_POST['class_name'];
        $class_description = $_POST['class_description'];
        $class_grade = $_POST['class_grade'];
        $class_subject = $_POST['class_subject'];

        $query = $sql = "INSERT INTO create_class (class_code, class_name, class_description, class_grade, class_subject, teacher_id) VALUES ('$randstr', '$class_name', '$class_description', '$class_grade', '$class_subject', '$usrid')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run){
          // echo " Form submitted successfully";
          header('location:teacher_classes.php');

        }
        else{
          echo "Form not submitted!";
        }
    }

    else {
      echo "All fields required!";
    }
}
//This will generate code and insert class to table 'create_class'
 ?>



<!-- Modal for joining class -->
<div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Join Class</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <br>
        <!-- Modal body -->
        <div class="container">

      <form action="/action_page.php">
          <div class="form-group">
          <input type="text" class="form-control" id="codeclass" placeholder="Code" name="code">
          </div>
          </form>
          </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Join</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>
  </div>
<!-- End of Modal join-->


<?php include 'script.php'; ?>
<script type="text/javascript">
$(document).ready( function() {
  $('.remove').click( function() {
  var id = $(this).attr("id");
    $.ajax({
    type: "POST",
    url: "delete_class.php",
    data: ({id: id}),
    cache: false,
    success: function(html){
    location.reload();
    }
    });
    return false;
  });
});
</script>


</body>
</html>
