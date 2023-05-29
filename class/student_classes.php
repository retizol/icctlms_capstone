<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
ob_start();
?>
<body>
  <div class="container mb-4 bg-white p-4 border rounded">
            <div class="row mb-4">
                <div class="col-sm-12 ">
                  <h4 class="float-left">My Classes</h4>
                  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal3">Join Class</button>
                </div>
                </div>


<!--NEED TO ADD WITHDRAW BUTTON-->

        <div class="row">

                    <?php
                    $sql= mysqli_query($conn, "SELECT * FROM create_class LEFT JOIN teacher_class_student ON create_class.class_id = teacher_class_student.class_id INNER JOIN users ON users.usersId = create_class.teacher_id WHERE student_id = '$usrid'")or die(mysqli_error());
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
                            <!--?php style="height: 190px; border-left: 3px solid; border-left-color: red" ?-->
                          <div class="card" >
                            <div class="card-body">
                              <p class="card-title" style="height: 20px;"><b>Class Name: <?php echo $class_name; ?></b></hp>
                                <p class="card-text text-truncate mb-2"><b>Description:</b> <span class="text-secondary lead " style="font-size: 16px; "><?php echo $class_description; ?></span></p>
                              <p class="card-text mb-3"><b>Professor:</b> <?php echo $class_profF .'&nbsp;'. $class_profL; ?></p>
                              <div class="d-flex justify-content-around">
                                <a class="btn btn-success" href="../quiz/studentclass.php<?php echo '?id='.$id;?>">View Class</a>
                                <a class="btn btn-danger " href="#<?php echo $id; ?>" data-toggle="modal">Withdraw</a>
                                <a class="disabled" href="#"></a>
                              </div>

                            </div>
                          </div></a>
                        </div>
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
                          Are you sure you want to withdraw this class?
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
                  <h4 class="modal-title">Join Class</h4>
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
          <td ><a href="../quiz/student_quiz_list.php</?php echo '?id='.$id;?>" class="btn btn-primary">View Class</a></td>
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
        <script type="text/javascript">
        $(document).ready( function() {
          $('.remove').click( function() {
          var id = $(this).attr("id");
            $.ajax({
            type: "POST",
            url: "delete_joined_class.php",
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
