<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include '../session.php';
include 'navbarsession.php';?>
<?php $get_id = $_GET['id']; ?>
<body style="padding-top: 110px">
  <div class="container">
    <a  href="thisclass.php<?php echo '?id='.$get_id; ?>"  class="btn btn-success" name="">Back</a>
    <form action="delete_class_quiz.php<?php echo '?id='.$get_id; ?>" method="post">
      <a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name="">Delete</a>
      <!--?php include('modal_delete_class_quiz.php'); ?-->
      <!--Modal-->
      <div id="backup_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
      <div class="modal-header">
        <h5 id="myModalLabel">Delete Quiz?</h5>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

      </div>
      <div class="modal-body">
      <div class="alert alert-danger">
      <p>Are you sure you want to delete the quiz in this class that you check?.</p>
      </div>
      </div>
      <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"></i> Close</button>
      <button name="backup_delete" class="btn btn-danger">Yes</button>
      </div>
      </div>
    </div>
    </div>
  					<table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                <!--Modal-->
										<thead>
										        <tr>
												<th></th>
												<th>Quiz title</th>
												<th>Description</th>
												<!--th>Quiz Time</th-->
												<th>Date Added</th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($conn,"SELECT * FROM class_quiz
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where teacher_class_id = '$get_id'
										order by date_added DESC ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['class_quiz_id'];
									?>
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['quiz_title']; ?></td>
                     <td><?php echo $row['quiz_description']; ?></td>
                     <!--td><!?php echo $row['quiz_time'] / 60; ?></td-->
                     <td><?php echo $row['date_added']; ?></td>
										</tr>
									<?php } ?>
										</tbody>
									</table>
									</form>


        </div>
		<?php include 'script.php'; ?>

    </body>
</html>
