<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
ob_start();
?>
<body style="padding-top: 110px;">
  <div class="container mb-4">
            <div class="row">
                <div class="col-sm-12 ">
                  <h4 class="float-left">My Classes</h4>
                  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal3">Join Class</button>
                </div>
                </div>
  </div>

<!--NEED TO ADD WITHDRAW BUTTON-->
      <div class="container">
        <div class="row">

                    <?php
                    $sql= mysqli_query($conn, "SELECT * From create_class left join teacher_class_student On create_class.class_id = teacher_class_student.class_id inner join users on users.usersId = create_class.teacher_id WHERE student_id = '$usrid'")or die(mysqli_error());
                    $count = mysqli_num_rows($sql);
                    	if ($count > 0){
                      while($row=mysqli_fetch_assoc($sql)){
                        $class_name=$row['class_name'];
                        $class_description=$row['class_description'];
                        $id = $row['class_id'];
                        $class_profF=$row['usersFName'];
                        $class_profL=$row['usersLName'];?>



                        <div class="col-md-4 mb-3" data-target="#cardlink<?php echo $id;?>">
                          <a id="cardlink<?php echo $id;?>" href="../quiz/studentclass.php<?php echo '?id='.$id;?>" class="card-link text-dark">
                          <div class="card" style="height: 190px">
                            <div class="card-body">
                              <p class="card-title" style="height: 20px;"><b>Class Name: <?php echo $class_name; ?></b></hp>
                                <p class="card-text text-truncate mb-2"><b>Description:</b> <span class="text-secondary lead " style="font-size: 16px; "><?php echo $class_description; ?></span></p>
                              <p class="card-text mb-3"><b>Professor:</b> <?php echo $class_profF .'&nbsp;'. $class_profL; ?></p>

                              <a class="btn btn-success mr-4" href="studentclass.php<?php echo '?id='.$id;?>">Open</a>
                              <a class="btn btn-danger " href="#<?php echo $id; ?>" data-toggle="modal">Remove</a>
                            </div>
                          </div></a>
                        </div>

                    <?php }}?>
                    <div class="col-md-4 mb-3" data-toggle="modal" data-target="#myModal3">
                      <div class="card p-4" style="height: 190px">
                        <a class="card-link text-center text-muted mt-3"><img src="../images/add.png" alt="" class=" mb-2" style="height:60px"><br>Join Class</a>
                      </div>
                    </div>
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
        //TO STUDENT CLASSES TABLE EDTION
        <tr id="del<!?php echo $id; ?>">
          <td >
            <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<!?php echo $id; ?>">
          </td>
          <td ><!?php echo $row['class_name']; ?></td>
          <td ><!?php echo $row['class_description']; ?></td>
          <td ><a href="../quiz/student_quiz_list.php<?php echo '?id='.$id;?>" class="btn btn-primary">View Class</a></td>
        </tr>//END OF TABLE EDITION
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
