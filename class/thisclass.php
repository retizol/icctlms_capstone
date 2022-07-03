<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
$get_id = $_GET['id']; ?>
<body style="padding-top: 110px">
  <div class="container">
    <ul class="nav nav-tabs " id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-dark" id="quiztab" data-toggle="tab" href="#quizzes" role="tab" aria-controls="profile" aria-selected="false">Class Quiz</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="mb-3">
      <div class="mt-3">

      </div>
      <?php //count for students
      $mystudents = mysqli_query($conn,"SELECT t.* FROM teacher_class_student as t
        LEFT JOIN users as t2
        ON t2.usersId = t.student_id
        where class_id = '$get_id'");
        $countstudent = mysqli_num_rows($mystudents);
        ?>
        Number of Students: <span class="badge badge-primary"><?php echo $countstudent; ?></span>
      </div>

      <div>
        <div>
          <table cellpadding="0" cellspacing="0" border="0" class="table ">
            <thead>
              <tr>
                <th></th>
                <th>Student Number</th>
                <th>Name (Last, First )</th>
                <!--th>Quiz Time</th-->
                <th></th>
              </tr>
            </thead>

            <tbody>


            <?php
            $mystudent = mysqli_query($conn,"SELECT * FROM teacher_class_student
              LEFT JOIN users as t2
              ON t2.usersId = teacher_class_student.student_id
              where class_id = '$get_id' order by usersLName ")or die(mysqli_error());
              while($row = mysqli_fetch_array($mystudent)){
                $id = $row['teacher_class_student_id'];
                ?>
                <tr id="del<?php echo $id; ?>">
                  <td class="align-middle"><a href="#">
                    <img  src ="../images/ImgResponsive_Placeholder.png" width="30" height="30" class="img rounded-circle">
                  </a></td>
                  <td class="align-middle"><?php echo $row['usersUid']?></td>
                  <td class="align-middle text-uppercase"><?php echo $row['usersLName'] .',&nbsp;'. $row['usersFName'];?></td>
                  <td class="align-middle"><a class="btn btn-danger" href="#<?php echo $id; ?>" data-toggle="modal">Remove
                  </a></td>
                </tr>


                <!--modal-->
                <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 id="myModalLabel">Remove Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <div class="modal-body">
                        <div class="alert alert-danger">Are you sure you want to remove this student on your class?
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button name="remove" class="btn btn-danger remove" id="<?php echo $id; ?>">Yes</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </tbody>
              </table>
          </div>
          </div>
  </div>

  <div class="tab-pane fade" id="quizzes" role="tabpanel" aria-labelledby="quiztab"><?php include_once 'classquiz.php' ?></div>
</div>


<?php include 'script.php'; ?>
<script type="text/javascript">
$(document).ready( function() {
  $('.remove').click( function() {
    var id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "remove_student.php",
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

</div>
</body>
</html>
