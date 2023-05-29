<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
ob_start();
if ((!isset($usrcid)) || !($usrcid == '1' || $usrcid == '2')) {
  header('location: ../dashboard.php');
}
?>
<body>


<div class="container">


  <div class="row">
      <div class="col-sm-12 ">
        <h4 class="float-left">My Classes</h4>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#createClass">Add Class</button>
      </div>
      </div>
</div>

<div class="container">
      <br>
        <div class="row" >
            <?php
            $sqltcs= mysqli_query($conn, "SELECT * FROM create_class WHERE teacher_id = '$usrid'");
            $count = mysqli_num_rows($sqltcs);
              if ($count > 0){
              while($rows=mysqli_fetch_assoc($sqltcs)){
                $class_name=$rows['class_name'];
                $class_description=$rows['class_description'];
                $id = $rows['class_id'];  ?>

                <div class="col-md-4 mb-3" data-target="#cardlink<?php echo $id;?>">
                  <a id="cardlink<?php echo $id;?>" href="thisclass.php<?php echo '?id='.$id;?>" class="card-link text-dark ">
                  <div class="card hoverable" style="height: 170px">
                    <div class="card-body ">

                      <p class="card-title" style="height: 20px;"><b>Class Name: <?php echo $rows['class_name']; ?></b></p>

                      <p class="card-text text-truncate mb-1"><b>Description:</b> <span class="text-secondary lead " style="font-size: 16px;"><?php echo $rows['class_description']; ?></span></p>
                      <br>

                      <div class="d-flex justify-content-around">
                    <a class="btn btn-success" href="thisclass.php<?php echo '?id='.$id;?>">Open</a>

                    <!--a class="btn btn-warning text-light" href="#edit<!?php echo $id; ?>" data-toggle="modal">&nbsp;Edit&nbsp;</a-->

                    <a class="btn btn-danger " href="#<?php echo $id; ?>" data-toggle="modal">Remove</a>
                    <a class="disabled" href="#"></a>
                    </div>
                </div>
              </div></a>
            </div>
                  <!-- Modal remove-->
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
                      <!-- Modal for code-->

                      <div id="#edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="mycode" aria-hidden="true">

                        		<div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 id="mycode">Remove Class</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                        </div>
                          <div class="modal-body">
                          <div class="alert alert-danger">
                            Are you sure you want to Remove this class?
                          </div>
                          </div>
                        <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                              <!-- Modal -->

            <?php }}?>


            <div class="col-md-4 mb-3" data-toggle="modal" data-target="#createClass">
              <div class="card p-4" style="height: 170px">
                <a class="card-link text-center text-muted mt-2"><img src="../images/add.png" alt="" class="mb-2" style="width: 4rem" ><br>Add Class</a>
              </div>
            </div>

        </div>
  </div>
  <!-- =======End of container -->
  <br>
<form  method="POST">
<div class="modal" id="createClass">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Class</h4>
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
              <option selected disabled>Select a Grade</option>
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
