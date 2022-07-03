<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
?>
<?php $get_id = $_GET['id']; ?>
<body>

												<div>
                            <div>
                                <div>
									<div class="float-right">
									<a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
									</div>
								<?php
								$query = mysqli_query($conn,"select * from quiz where quiz_id = '$get_id'")or die(mysqli_error());
								$row  = mysqli_fetch_array($query);
								?>
									    <form class="form-horizontal" method="post">
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
										<div class="control-group">
										<div class="controls">
										<button name="save" type="submit" class="btn btn-success">Save</button>
										</div>
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
		<?php include('script.php'); ?>
    </body>
</html>
