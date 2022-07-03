<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
?>
<body style="padding-top: 110px">
  <div class="container">
    <div>
      <div class="pull-right">
        <a href="add_quiz.php" class="btn btn-info"> Add Quiz</a>
        <td width="30"><a href="add_quiz_to_class.php" class="btn btn-success"> Add Quiz to Class</a></td>
      </div>
      <a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name="">Delete</a>
      <form class="mt-3" action="delete_quiz.php" method="post">
        <?php include('modal_delete_quiz.php'); ?>
        <table cellpadding="0" cellspacing="0" border="0" class="table">
          <thead class="mt-3">
            <tr>
              <th></th>
              <th>Quiz title</th>
              <th>Description</th>
              <th>Date Added</th>
              <th>Questions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($conn,"select * FROM quiz where teacher_id = '$usrid'  order by date_added DESC ")or die(mysqli_error());
            while($row = mysqli_fetch_array($query)){
              $id  = $row['quiz_id'];
              ?>
              <tr id="del<?php echo $id; ?>">
                <td width="30">
                  <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                </td>
                <td><?php echo $row['quiz_title']; ?></td>
                <td><?php  echo $row['quiz_description']; ?></td>
                <td><?php echo $row['date_added']; ?></td>
                <td><a href="quiz_question.php<?php echo '?id='.$id; ?>">Questions</a></td>
                <td width="30"><a href="edit_quiz.php<?php echo '?id='.$id; ?>" class="btn btn-success">Edit</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <a href="../dashboard.php">Dashboard</a>
    </div>
  </div>
  <?php include('script.php'); ?>
</body>
</html>
