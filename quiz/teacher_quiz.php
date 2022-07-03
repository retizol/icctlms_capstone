<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
if ((!isset($usrcid)) || !($usrcid == '1' || $usrcid == '2')) {
  header('location: ../dashboard.php');
}
?>


<body style="padding-top: 110px">
  <div class="container">
      <div class="float-right">
        <a data-toggle="modal" href="#add_quiz" id="addquiz" class="btn btn-info" data-backdrop="false">Add Quiz</a>
        <?php include 'modal_add_quiz.php'; ?>
        <td><a data-toggle="modal" href="#add_quiz_to_class" id="addquiztoclass" class="btn btn-success" data-backdrop="false">Add Quiz to Class</a></td>
        <?php include 'modal_add_quiz_to_class.php'; ?>
      </div>
      <a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name="">Delete</a>

      <form class="mt-3" action="delete_quiz.php" method="post">
        <?php include('modal_delete_quiz.php'); ?>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
          <thead class="mt-3">
            <tr>
              <th ></th>
              <th >Quiz title</th>
              <th >Description</th>
              <th >Questions</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($conn,"SELECT * FROM quiz where teacher_id = '$usrid'  order by date_added DESC ")or die(mysqli_error());
            while($row = mysqli_fetch_array($query)){
              $id = $row['quiz_id'];
              ?>
              <tr id="del<?php echo $id; ?>">
                <td >
                  <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                </td>
                <td ><?php echo $row['quiz_title']; ?></td>
                <td ><?php  echo $row['quiz_description']; ?></td>

                <td ><a href="quiz_question.php<?php echo '?id='.$id; ?>" class="btn btn-primary">Questions</a></td>
                <!--td style="width:70px"><a href="edit_quiz.php<!?php echo '?id='.$id; ?>" class="btn btn-success">Edit</a></td-->
                <!--td style="width:70px"><data-toggle="modal" href="#edit_class<!?php echo '?id='.$id; ?>" class="btn btn-success">Edit</a></td-->
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
  </div>
  <?php include('script.php'); ?>

</body>
</html>
