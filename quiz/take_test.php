<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
?>
<?php $get_id = $_GET['id']; ?>
<?php $class_quiz_id = $_GET['class_quiz_id']; ?>
<?php $quiz_id = $_GET['quiz_id']; ?>
<?php $quiz_time = $_GET['quiz_time']; ?>

<?php $query1 = mysqli_query($conn,"SELECT * from student_class_quiz where student_id = '$usrid' and class_quiz_id = '$class_quiz_id' ")or die(mysqli_error());
	  $count = mysqli_num_rows($query1);
?>
<?php
if ($count > 0){
}else{
 mysqli_query($conn,"INSERT into student_class_quiz (class_quiz_id,student_id,student_quiz_time) values('$class_quiz_id','$usrid','$quiz_time')");
}
 ?>

 <style>
 #group div{
     display: none;
 }
 #group div.current{
     display: block;
 }
 </style>


<body style="padding-top: 110px">
	<div class="container ">
		<div>
			<?php
			if($_GET['test'] == 'ok'){
				$sqlp = mysqli_query($conn,"SELECT * FROM class_quiz WHERE class_quiz_id = '$class_quiz_id'")or die(mysqli_error());
				$rowp = mysqli_fetch_array($sqlp);
				$x=0;
				?>
				<script>
				jQuery(document).ready(function(){
					var timer = 1;
					jQuery(".questions-table input").hide();
				setInterval(function(){
					var timer = jQuery("#timer").text();
					jQuery("#timer").load("timer.ajax.php");
					if(timer == 0){
						jQuery(".questions-table input").hide();
						jQuery("#submit-test").show();
						jQuery("#msg").text("Time's up!!!\nPlease Submit your Answers");
					} else {
						jQuery(".questions-table input").show();
					}
				},990);
				});
				</script>

			<form action="take_test.php<?php echo '?id='.$get_id; ?>&<?php echo 'class_quiz_id='.$class_quiz_id; ?>&<?php echo 'test=done' ?>&<?php echo 'quiz_id='.$quiz_id; ?>&<?php echo 'quiz_time='.$quiz_time; ?>" name="testform" method="POST" id="test-form">
				<?php
					$sqla = mysqli_query($conn,"SELECT * FROM class_quiz
					LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
					where teacher_class_id = '$get_id'
					order by date_added DESC ")or die(mysqli_error());
					$rowa = mysqli_fetch_array($sqla);


					?>
					<h3><?php echo $rowa['quiz_title'];?></h3>
					<h6>Description: <?php echo $rowa['quiz_description'];?></h6>
					<p></p>
					<!--div class="">
						Time Remaining:<div id="timer">1</div>
					</div-->
					<div id="msg"></div>
					<script>
					$(document).ready(function(){
						$(".questions").each(function(){
							$(this).hide();
						});
						$("#q_1").show();
					});
					</script>

					<script>
					jQuery(document).ready(function(){
						var nq = 0;
						var qn = 0;
						jQuery(".nextq").click(function(){
							qn = jQuery(this).attr('qn');
							nq = parseInt(qn) + 1;
							jQuery('#q_' + qn ).hide();
							jQuery('#q_' + nq ).show();
						});
					});
				</script>



				<!--div class="questions-table"-->

					<?php
					$sqlw = mysqli_query($conn,"SELECT * FROM quiz_question where quiz_id = '$quiz_id'  ORDER BY RAND()");
					$qt = mysqli_num_rows($sqlw);
					while($roww = mysqli_fetch_array($sqlw)){
						?>
						<div class="container">
							<div class="row">
								<div id="" class="col border rounded mb-3 p-4">

						<div id="q_<?php echo $x=$x+1;?>" class="questions container">
							<div id="qa" >Question <?php echo $x;?></div>
							<div class="mb-3">Points <?php echo $roww['points'];?></div>
							<hr class="p-0 ">
							<div id="qa" >
								<div class="">
									<?php echo $roww['question_text'];?>
								</div>

								<br>

								<?php
								if($roww['question_type_id']=='2'){
									?>

									<div class=" border rounded mb-1 p-3 w-75">
									<input style="opacity: 1.0" name="q-<?php echo $roww['quiz_question_id'];?>" value="True" type="radio" id="t<?php echo $roww['quiz_question_id'];?>" >
									<label class="m-0" for="t<?php echo $roww['quiz_question_id'];?>"> True</label>
									</div>

									<div class="border rounded p-3 w-75">
									<input name="q-<?php echo $roww['quiz_question_id'];?>" value="False" type="radio" id="f<?php echo $roww['quiz_question_id'];?>">
									<label class="m-0" for="f<?php echo $roww['quiz_question_id'];?>"> False</label>
									</div>


									<?php
								} else if($roww['question_type_id']=='1') {
									$sqly = mysqli_query($conn,"SELECT * FROM answer WHERE quiz_question_id = '".$roww['quiz_question_id']."'");
									while($rowy = mysqli_fetch_array($sqly)){
										if($rowy['choices'] == 'A') {
											?>
											<div class="border rounded mb-1 p-3 w-75">
											<input  name="q-<?php echo $roww['quiz_question_id'];?>" value="A" type="radio" id="a<?php echo $roww['quiz_question_id'];?>">
											<label class="m-0" for="a<?php echo $roww['quiz_question_id'];?>">&nbsp;<strong>A.</strong>&emsp;<?php echo $rowy['answer_text'];?></label>
											</div>
										<?php } else if ($rowy['choices'] == 'B') {?>
											<div class="border rounded mb-1 p-3 w-75">
											<input  name="q-<?php echo $roww['quiz_question_id'];?>" value="B" type="radio" id="b<?php echo $roww['quiz_question_id'];?>">
											<label class="m-0" for="b<?php echo $roww['quiz_question_id'];?>">&nbsp;<strong>B.</strong>&emsp;<?php echo $rowy['answer_text'];?></label>
											</div>
										<?php } else if ($rowy['choices'] == 'C') {?>
											<div class="border rounded mb-1 p-3 w-75">
											<input  name="q-<?php echo $roww['quiz_question_id'];?>" value="C" type="radio" id="c<?php echo $roww['quiz_question_id'];?>">
											<label class="m-0" for="c<?php echo $roww['quiz_question_id'];?>">&nbsp;<strong>C.</strong>&emsp;<?php echo $rowy['answer_text'];?></label>
											</div>
										<?php } else if ($rowy['choices'] == 'D') {?>
											<div class="border rounded p-3 w-75">
											<input  name="q-<?php echo $roww['quiz_question_id'];?>" value="D" type="radio" id="d<?php echo $roww['quiz_question_id'];?>">
											<label class="m-0" for="d<?php echo $roww['quiz_question_id'];?>">&nbsp;<strong>D.</strong>&emsp;<?php echo $rowy['answer_text'];?></label>
											</div>
											<?php

										}
									}
								}
								?>
								<br/>
								<!--button onclick="return false;" qn="<!?php echo $x;?>" class="nextq btn btn-success" id="next_<!?php echo $x;?>">NEXT question</button-->
								<input type="hidden" name="x-<?php echo $x;?>" value="<?php echo $roww['quiz_question_id'];?>">
							</div>
						</div>
						</div>
						</div>

					</div>
						<?php
					}
					?>
					<div class="container">
						<div class="row">
						<button class="btn btn-info" id="submit-test" name="submit_answer">Submit Answer</button>
					</div>
					</div>

				</div>
				<input type="hidden" name="x" value="<?php echo $x;?>">
			</form>




			<?php
		} else if(isset($_POST['submit_answer'])){
			$x1 = $_POST['x'];
			$score = 0;
			for($x=1;$x<=$x1;$x++){

				$x2 = $_POST["x-$x"];
				$q = $_POST["q-$x2"];

				$sql = mysqli_query($conn,"SELECT * FROM quiz_question WHERE quiz_question_id = ".$x2."");
				$row = mysqli_fetch_array($sql);
				if($row['answer'] == $q) {
					$score= $score + 1;
				}

			} ?>
			<a href="studentclass.php<?php echo '?id='.$get_id; ?>">Back</a>
			<center>
				<h3><br>Your score is <b><?php echo $score; ?></b>/<b><?php echo ($x-1); ?></b><br/></h3>
			</center>
			<?php
			/* echo "Your Percentage Grade is : <b>".$per."%</b>"; */
			mysqli_query($conn,"UPDATE student_class_quiz SET student_quiz_time = 3600, grade = '".$score."/".($x-1)."' WHERE student_id = '$usrid' and class_quiz_id = '$class_quiz_id'")or die(mysqli_error());
			?>
			<script>
	  window.location = 'studentclass.php<?php echo '?id='.$get_id; ?>';
	</script>
	<?php
		}
			?>
			<br>
</div>

<?php include 'script.php'; ?>
<!--script>
function updateItems(delta)
{
		var $items = $('#group').children();
		var $current = $items.filter('.current');
		var index = $current.index();
		var newIndex = index+delta;
		// Range check the new index
		newIndex = (newIndex < 0) ? 0 : ((newIndex > $items.length) ? $items.length : newIndex);
		if (newIndex != index){
				$current.removeClass('current');
				$current = $items.eq(newIndex).addClass('current');
				// Hide/show the next/prev
				$("#prev").toggle(!$current.is($items.first()));
				$("#next").toggle(!$current.is($items.last()));
		}
}
$("#next").click(function () {
		updateItems(1);
});
$("#prev").click(function () {
		updateItems(-1);
});

</script-->

</body>
</html>
