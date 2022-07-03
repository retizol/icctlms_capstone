<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICCT-OLMS </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>


<body>
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
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal1" >Create Class</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal2" >Agenda</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal3" >Join Class</a>
                          </div>
                  </div>
                </div>
              </div>
</div>



<div class="container">
      <br>
        <div class="row">
          <div class="leftcolumn">

            <div class="card-deck">
                <div class="card bg-light">
                    <a data-toggle="modal" data-target="#myModal1" >
                    <div class="card-body text-center">
                    <br>+<br>Create New Class<br><br>
                    </div></a>
                </div>
                <div class="card bg-light">
                <div class="card-body text-center">
                    <br><br><br><br>
                </div>
                </div>

            </div>
            </div>

        </div>
  </div>
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
<!-- =========================================================================NEW UPDATED -->
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
<!-- MODAL CREATE CLASS --><!-- MODAL CREATE CLASS --><!-- MODAL CREATE CLASS -->
<form action="insert_class.php" method="POST">
<div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Class</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <br>


        <!-- Modal body -->
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
          <button type="submit" name="submit" class="btn btn-primary">Create</button>
          <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>
  </div>

  </form>





<!-- MODAL JOINE CLASS --><!-- MODAL JOINE CLASS --><!-- MODAL JOINE CLASS -->
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



<!-- MODAL CREATE EVENT --><!-- MODAL CREATE EVENT --><!-- MODAL CREATE EVENT -->
<div class="modal" id="myModal5">
    <div class="modal-dialog " >
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Events</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <br>
        <!-- Modal body -->
        <div class="container">

      <form action="/action_page.php">
          <div class="form-group">
          Event Name
          <input type="text" class="form-control" id="nameevent" placeholder="Add event title here..." name="nameevent">
          </div>
          <div class="form-group">
          Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Time
          <input type="datetime-local" id="starttime" name="starttime">&nbsp;&nbsp;&nbsp;<input type="datetime-local" id="endtime" name="endtime">
          </div>
          <div class="form-group">
          Recuring Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remind Participants
          <br>

          </div>

          <div class="form-group">
            <label for="sel1">Participants</label>
            <select class="form-control" id="sel1" name="sellist1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" placeholder="Add Discription" name="text"></textarea>
          </div>

          </form>

          </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Create</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>
  </div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>
</html>
