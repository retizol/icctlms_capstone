<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
$get_id = $_GET['id'];
?>
<body style="padding-top: 110px">
	<div class="container">
		<div class="float-right">
			<a href="teacher_quiz.php" class="btn btn-success">Back</a>
			<a href="add_question.php<?php echo '?id='.$get_id;?>" class="btn btn-info">Add Question</a>
		</div>
		<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name="">Delete</a>
		<form class="mt-3" action="delete_quiz_question.php" method="post">
			<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
			<?php include('modal_delete_quiz_question.php'); ?>
			<table cellpadding="0" cellspacing="0" border="0" class="table">
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
								<td><?php echo $row['question_text']; ?></td>
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
	<?php include('script.php');?>
</body>
</html>
