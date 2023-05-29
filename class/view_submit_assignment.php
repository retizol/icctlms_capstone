<?php include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php'; ?>
<?php
$get_id = $_GET['id'];
$post_id = $_GET['post_id'];?>
<body>
	<div class="container bg-white p-4 border rounded">
		<?php
		$query1 = mysqli_query($conn,"SELECT * FROM assignment WHERE assignment_id = '$post_id'");
		$row1 = mysqli_fetch_array($query1);
		?>
		<div class="alert alert-info">Submitted Assignment in : <?php echo $row1['title']; ?></div>
		<div id="">
			<table class="table">
				<thead>
					<tr>
						<!--th scope="col">Date Submitted</th-->
						<th scope="col">Student</th>
						<th scope="col">File</th>
						<th scope="col">Grade</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = mysqli_query($conn,"SELECT * FROM student_assignment
						LEFT JOIN users ON users.usersId  = student_assignment.student_id
						WHERE assignment_id = '$post_id'  ORDER BY date_added DESC");
						while($row = mysqli_fetch_array($query)){
							$id  = $row['student_assignment_id'];
							$file = $row['floc'];
							$subt = substr($file, -15);
							?>
							<tr>
								<!--td></?php echo $row['date_added']; ?></td-->
								<td style="size: 10rem;"><?php echo $row['usersUid']."_ ". $row['usersLName']." ".$row['usersFName']; ?></td>
								<td class="pt-2" style="size: 12rem;"><a href="<?php echo $row['floc']; ?>" class="btn btn-secondary" target="_blank" style="font-size: 0.9rem;">View File</a></td>
								<td class="pt-2" style="width:5rem;">
									<form method="post" action="save_grade.php">
										<input type="hidden" class="" name="id" value="<?php echo $id; ?>">
										<input type="hidden" class="" name="post_id" value="<?php echo $post_id; ?>">
										<input type="hidden" class="" name="get_id" value="<?php echo $get_id; ?>">
										<input type="text" class="form-control" name="grade" value="<?php echo $row['grade']; ?>"></td>
										<td class="pt-2">
										<button name="save" class="btn btn-success" id="btn_s">Save</button>
									</form>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php include 'script.php'; ?>
	</body>
</html>
