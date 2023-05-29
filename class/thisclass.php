<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';
$get_id = $_GET['id']; ?>
<body>
  <div class="container bg-white p-4 border rounded">

    <?php
    $sqltcs= mysqli_query($conn, "SELECT * FROM create_class WHERE class_id = '$get_id'");
    $rows = mysqli_fetch_array($sqltcs);
    $class_name=$rows['class_name'];
    $class_description=$rows['class_description'];
    $class_code = $rows['class_code'];
    ?>
    <h3 class="card-title"><b>Class Name: <?php echo $rows['class_name']; ?></b></h3>
    <p class="card-text text-truncate mb-3"><b style="font-size: 20px">Description:</b> <span class="text-secondary lead " style="font-size: 20px;"><?php echo $rows['class_description']; ?></span></p>
    <h5 class="card-text text-truncate mb-3">Class Code: <span id="codespan"><?php echo $class_code; ?></span> <button id="copybtn" onclick="myFunction()" class="btn btn-secondary p-0 pl-1 pr-1"style="font-size: 0.8rem">Copy this</button></h5>



    <ul class="nav nav-pills mb-3" id="myTab" role="tablist" style="font-size: 0.9rem">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >My Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="quiztab" data-toggle="tab" href="#quizzes" role="tab" aria-controls="profile" aria-selected="false">Class Quiz</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="asstab" data-toggle="tab" href="#asstabs" role="tab" aria-controls="profile" aria-selected="false">Assignment</a>
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
          <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
            <thead>
              <tr>
                <th></th>
                <!--th>Student #</th-->
                <th>Student</th>
                <!--th>Quiz Time</th-->
                <!--th>Email</th-->
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
                $ids = $row['teacher_class_student_id'];
                ?>
                <tr id="del<?php echo $ids; ?>">
                  <td class="align-middle"><a href="#">
                    <img  src ="../images/ImgResponsive_Placeholder.png" width="30" height="30" class="img rounded-circle">
                  </a></td>
                  <td class="align-middle" style="font-size:1.1rem"><?php echo $row['usersUid']?>_ <span class="text-uppercase"><?php echo $row['usersLName'] .',&nbsp;'. $row['usersFName'];?></span><br><small><b>@:</b> <?php echo $row['usersEmail']; ?></small></td>
                  <!--td class="align-middle text-uppercase"><!?php echo $row['usersLName'] .',&nbsp;'. $row['usersFName'];?></td-->
                  <!--td class="align-middle"><!?php echo $row['usersEmail']; ?></td-->
                  <td class="align-middle">
                    <a class="btn btn-danger" href="#<?php echo $ids; ?>" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>


                <!--modal-->
                <div id="<?php echo $ids; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <button name="remove" class="btn btn-danger remove" id="<?php echo $ids; ?>">Yes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--MODAL-->
              <?php } ?>
              </tbody>
              </table>
          </div>
          </div>
  </div>

  <div class="tab-pane fade" id="quizzes" role="tabpanel" aria-labelledby="quiztab"><?php include_once 'classquiz.php' ?></div>

  <div class="tab-pane fade" id="asstabs" role="tabpanel" aria-labelledby="asstab"><?php include_once 'assignment.php' ?></div>
</div>


<?php include 'script.php'; ?>
<script type="text/javascript">
$(document).ready( function() {
  $('.removes').click( function() {
    var id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "delete_assignment.php",
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

<script>
document.getElementById("copybtn").addEventListener("click", copy_here);
function copy_here() {
    var copyText = document.getElementById("codespan");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
    alert("Copied: " + copyText.textContent + " to clipboard");
}
</script>

</div>
</body>
</html>
