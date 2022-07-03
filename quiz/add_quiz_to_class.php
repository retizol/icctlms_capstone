<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
?>
<body>
	<div class="container">
			<div class="row">
					<div  id="content">
							 <div class="row">
                        <div>
                            <div>
                                <div  class=" float-right"></div>
                            </div>
                            <div class="">
                                <div>
									<div class="float-right">
									<a href="teacher_quiz.php" class="btn btn-info">Back</a>
									</div>

									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Quiz</label>
											<div class="controls">
											<select name="quiz_id">
											<option></option>
												<?php  $query = mysqli_query($conn,"select * from quiz where teacher_id = '$usrid'")or die(mysqli_error());
												while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id']; ?>
												<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
												<?php } ?>
											</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Test Time (in minutes)</label>
											<div class="controls">
											<input type="text" class="span3" name="time" placeholder="Test Time" required>
											</div>
										</div>

												<table class="table" id="question">
                <th></th>
                <th>Class</th>
                <th>Subject</th>
                <th></th>

				<tbody>
					<?php $query = mysqli_query($conn,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$usrid'")or die(mysqli_error());
										$count = mysqli_num_rows($query);


										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];

										?>
					<tr>
					<td width="30">
						<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
					</td>
					<td><?php echo $row['class_name']; ?></td>
					<td><?php echo $row['subject_code']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>


										<div class="control-group">
										<div class="controls">

										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>



										<?php
										if (isset($_POST['save'])){
											$quiz_id = $_POST['quiz_id'];
											$time = $_POST['time'] * 60;
											$id=$_POST['selector'];

													$name_notification  = 'Add Practice Quiz file';

											$N = count($id);
											for($i=0; $i < $N; $i++)
											{
												mysqli_query($conn,"insert into class_quiz (teacher_class_id,quiz_time,quiz_id) values('$id[$i]','$time','$quiz_id')")or die(mysqli_error());
												mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')")or die(mysqli_error());
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
                        <!-- /block -->
                    </div>
                </div>
            </div>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
