<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
ob_start();
$get_id = $_GET['id'];
?>
<body style="padding-top: 110px">
	<div class="container">
		<?php //action="quiz_question.php?id=  echo $get_id;"
		$query = mysqli_query($conn,"SELECT * from quiz where quiz_id = '$get_id'")or die(mysqli_error());
		$row  = mysqli_fetch_array($query);
		?>
					<form class="form-inline"  method="post">
				<div class="form-group mb-2">

					<label class="mr-2" for="qTitle">Quiz Title</label>
					<input type="hidden" name="quiz_id" value="<?php echo $row['quiz_id'];?>">
					<input class="form-control mr-2" type="text" name="quiz_title" value="<?php echo $row['quiz_title']; ?>" id="qTitle"  placeholder="Quiz Title">
					<br>
					<label class="mr-2" for="qDescription">Quiz Description</label>
					<input class="form-control mr-2" type="text" value="<?php echo $row['quiz_description'];?>" class="span8" name="description" id="qDescription" placeholder="Quiz Description" required>
					<br>
					<button name="saveqt" type="submit" class="btn btn-success">Save</button>
				</div>

				</form>
				<?php
				if (isset($_POST['saveqt'])){
				$quiz_id = $_POST['quiz_id'];
				$quiz_title = $_POST['quiz_title'];
				$description = $_POST['description'];
				mysqli_query($conn,"UPDATE quiz set quiz_title = '$quiz_title', quiz_description = '$description' where quiz_id = '$quiz_id'")or die(mysqli_error());
				header ('Location: quiz_question.php?id=' . $get_id);
				}
				?>
<hr>
	</div>




	<div class="container">
		<div class="float-right">
			<a href="teacher_quiz.php" class="btn btn-success">Back</a>
			<a href="add_question.php<?php echo '?id='.$get_id;?>" class="btn btn-info">Add Question</a>
		</div>

		<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name="delete">Delete</a>


		<form class="mt-3" action="delete_quiz_question.php" method="post">
			<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
			<div id="backup_delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">

						<div class="modal-header">
							<h5 id="myModalLabel">Delete Question</h5>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger">
								<p>Are you sure to delete question(s)?</p>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
							<button name="backup_delete" class="btn btn-danger">Yes</button>

						</div>
					</div>
				</div>
			</div>



			<table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
				<thead class="mt-3">
					<tr>
						<th></th>
						<th>Question</th>
						<th>Type</th>
						<th>Answer</th>
						<!--th>Date Added</th-->
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = mysqli_query($conn,"SELECT * FROM quiz_question
						LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
						where quiz_id = '$get_id'  order by date_added DESC ")or die(mysqli_error());
						while($row = mysqli_fetch_array($query)){
							$id  = $row['quiz_question_id'];?>
							<tr id="del <?php echo $id; ?>">
								<td width="30">
									<input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
								</td>
								<td class="text-truncate noselect" style="max-width: 6rem" ><?php echo $row['question_text']; ?></td>
								<td><?php  echo $row['question_type']; ?></td>
								<td><?php  echo $row['answer']; ?></td>
								<!--td><!?php echo $row['date_added']; ?--></td-->
								<td width="30"><a href="edit_question.php<?php echo '?id='.$get_id; ?>&amp;<?php echo 'quiz_question_id='.$id; ?>" class="btn btn-success">Edit</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>
		</div>
		<?php include_once 'script.php' ?>
</body>
</html>
