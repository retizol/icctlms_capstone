<?php $get_id = $_GET['id']; ?>
								<?php
								$query = mysqli_query($conn,"SELECT * from quiz where quiz_id = '$get_id'")or die(mysqli_error());
								$row  = mysqli_fetch_array($query);
								?>
								<div id="#edit_quiz" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="Close"><span aria-hidden="true">&times;</span></button>
								      </div>
								      <div class="modal-body">
												<form method="post">
											<div class="control-group">
												<label class="control-label" for="inputEmail">Quiz Title</label>
												<div class="controls">
												<input type="hidden" name="quiz_id" value="<?php echo $row['quiz_id']; ?>" id="inputEmail" placeholder="Quiz Title">
												<input type="text" name="quiz_title" value="<?php echo $row['quiz_title']; ?>" id="inputEmail" placeholder="Quiz Title">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputPassword">Quiz Description</label>
												<div class="controls">
												<input type="text" value="<?php echo $row['quiz_description']; ?>" class="span8" name="description" id="inputPassword" placeholder="Quiz Description" required>
												</div>
											</div>
												<div class="modal-footer">
									        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									        <button name="save" type="submit" class="btn btn-success">Save</button>
											</div>
											</form>
											<?php
											if (isset($_POST['save'])){
											$quiz_id = $_POST['quiz_id'];
											$quiz_title = $_POST['quiz_title'];
											$description = $_POST['description'];
											mysqli_query($conn,"update quiz set quiz_title = '$quiz_title',quiz_description = '$description' where quiz_id = '$quiz_id'")or die(mysqli_error());
											?>
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
