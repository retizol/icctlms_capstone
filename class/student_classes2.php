<?php
ob_start();
?>
<body style="padding-top: 110px;">
  <div class="container">
            <div class="row">
                <div class="col-md-12 bg-light">
                  <a href="student_classes.php" class="text-dark"><small>Class Management</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="student_progress.php" class="text-dark"><small>Progress</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                </div>
  <br>
                <div class="row">
                  <div class="col"><h4>My Classes</h4></div>
                  <div class="col">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle float-right" data-toggle="dropdown"> + Create</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" data-toggle="modal" data-target="#myModal3" >Join Class</a>
                            </div>
                    </div>
                  </div>
                </div>
  </div>

<!--NEED TO ADD WITHDRAW BUTTON-->
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
                    $sql= mysqli_query($conn, "SELECT * From create_class left join teacher_class_student On create_class.class_id = teacher_class_student.class_id WHERE student_id = '$usrid'")or die(mysqli_error());
                    $count = mysqli_num_rows($sql);
                    	if ($count > 0){
                      while($row=mysqli_fetch_assoc($sql)){
                        $class_name=$row['class_name'];
                        $class_description=$row['class_description'];
                        $id = $row['class_id'];  ?>
                        <tr id="del<?php echo $id; ?>">
                          <td >
                            <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                          </td>
                          <td ><?php echo $row['class_name']; ?></td>
                          <td ><?php echo $row['class_description']; ?></td>

                          <td ><a href="../quiz/student_quiz_list.php<?php echo '?id='.$id;?>" class="btn btn-primary">View Class</a></td>
                        </tr>

                    <?php }}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>



        <!--START OF MODAL-->
        <form method="POST">
          <div class="modal" id="myModal3">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Search a Class</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <br>
                <!-- Modal body -->
                <div class="container">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Code" name="code">
                  </div>
                </form>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" name="submitsc" class="btn btn-primary">Join</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <br>
      <!--?php
      if (isset($_POST['submitsc'])){
        $code = $_POST['code'];
          mysqli_query($conn,"INSERT INTO teacher_class_student (class_id, student_id, teacher_id)
          SELECT class_id, '$usrid', teacher_id FROM create_class WHERE class_code = '$code'")or die(mysqli_error());

          header('Location: student_classes.php');
//
          $sqls = mysqli_query($conn, "SELECT * From teacher_class_student WHERE class_code = '$code' && student_id='$usrid'")or die(mysqli_error());
               if(mysql_num_rows($sqls) == 1){

                 header('Location: ../dashboard.php');

               }else {}
        }

       ?-->
       <?php
       if (isset($_POST['submitsc'])){
         $code = $_POST['code'];
              mysqli_query($conn,"INSERT INTO teacher_class_student (class_code, class_id, student_id, teacher_id, class_name, class_description, class_grade, class_subject)
              SELECT '$code', class_id, '$usrid', teacher_id, class_name, class_description, class_grade, class_subject FROM create_class WHERE class_code = '$code'")or die(mysqli_error());

              header('Location: student_classes.php');
           }

        ?>
        <?php include 'script.php'; ?>
</body>
</html>
