<div id="add_quiz_to_class" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<div class="modal-header">
				<h5>Add Quiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

				<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Quiz</label>
				<div class="controls">
				<select class="form-control mb-2" name="quiz_id">
				<option selected disabled>Select Quiz</option>
					<?php  $query = mysqli_query($conn,"SELECT * from quiz where teacher_id = '$usrid'")or die(mysqli_error());
					while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id']; ?>
					<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
					<?php } ?>
				</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="timerX">Test Time (in minutes)</label>
				<div class="controls">
				<input class="form-control w-50 mb-3" type="number" name="time" id="timerX" placeholder="Test Time" required>
				</div>
			</div>
					<table class="table" id="question">
	<th></th>
	<th>Class</th>
	<th>Subject</th>
	<th></th>

<tbody>
<?php $query = mysqli_query($conn,"SELECT * from create_class
			where teacher_id = '$usrid'")or die(mysqli_error());
			$count = mysqli_num_rows($query);


			while($row = mysqli_fetch_array($query)){
			$id = $row['class_id'];

			?>
<tr >
<td >
<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
</td>
<td><?php echo $row['class_name']; ?></td>
<td><?php echo $row['class_subject']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
			<div class="control-group">
			<div class="controls">

			<button name="saveqtc" type="submit" class="btn btn-info">Save</button>
			<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
			</div>
			</form>
										<?php
										if (isset($_POST['saveqtc'])){
											$quiz_id = $_POST['quiz_id'];
											$time = $_POST['time'] * 60;
											$id=$_POST['selector'];

													$name_notification  = 'Add Practice Quiz file';

											$N = count($id);
											for($i=0; $i < $N; $i++)
											{
												mysqli_query($conn,"INSERT into class_quiz (teacher_class_id, quiz_time, quiz_id) values('$id[$i]','$time','$quiz_id')")or die(mysqli_error());
												mysqli_query($conn,"INSERT into notification (teacher_class_id, notification, date_of_notification, link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')")or die(mysqli_error());
											} ?>
											<script>
												window.location = 'teacher_quiz.php';
											</script>
											<?php
										}
										?>

									</div>

								</div>
							</div>
						</div>
