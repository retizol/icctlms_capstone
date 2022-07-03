<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
$get_id = $_GET['id']; ?>
<body style="padding-top: 110px">
  <div class="container">


  <div>
    <?php //count for students
    $mystudents = mysqli_query($conn,"SELECT t.* FROM teacher_class_student as t
      LEFT JOIN users as t2
      ON t2.usersId = t.student_id
      where class_id = '$get_id'");
      $countstudent = mysqli_num_rows($mystudents);
      ?>
      Number of Students: <span class="badge badge-info"><?php echo $countstudent; ?></span>
    </div>

    <div>
      <div>
        <ul	>
          <?php
          $mystudent = mysqli_query($conn,"SELECT * FROM teacher_class_student
            LEFT JOIN users as t2
            ON t2.usersId = teacher_class_student.student_id
            where class_id = '$get_id' order by usersLName ")or die(mysqli_error());
            while($row = mysqli_fetch_array($mystudent)){
              $id = $row['teacher_class_student_id'];
              ?>
              <li id="del<?php echo $id; ?>"class="list-unstyled">
                <a href="#">
                  <img  src ="../images/ImgResponsive_Placeholder.png" width="50" height="50" class="img">
                </a>
                <p class="class"><?php echo $row['usersLName'];?></p>
                <p class="subject"><?php echo $row['usersFName']; ?></p>
                <a href="#<?php echo $id; ?>" data-toggle="modal">Remove
                </a>
              </li>


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
          </ul>

          <a href="class_quiz.php<?php echo '?id='.$get_id;?>">Class Quiz</a>








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
</div>
</div>
</body>
</html>
