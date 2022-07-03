
                                <div class="">

								<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
										<thead>
										        <tr>
												<th>Quiz Title</th>
												<th>Description</th>
												<th>Quiz Time</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($conn,"SELECT * FROM class_quiz
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id' order by class_quiz_id ASC ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['class_quiz_id'];
										$quiz_id  = $row['quiz_id'];
										$quiz_time  = $row['quiz_time'];

										$query1 = mysqli_query($conn,"SELECT * from student_class_quiz where class_quiz_id = '$id' and student_id = '$usrid'")or die(mysqli_error());
										$row1 = mysqli_fetch_array($query1);
										$grade = $row1['grade'] ?? null;

									?>
										<?php if ($grade ==""){

										}else{ ?>
										<tr>
										 <td><?php echo $row['quiz_title']; ?></td>
                                         <td><?php  echo $row['quiz_description']; ?></td>
                                         <td><?php  echo $row['quiz_time'] / 60; ?></td>
                                         <td width="200">

										<b>Score <?php echo $grade; ?></b>

										</td>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Take This Quiz').tooltip('show');
															$('#<?php echo $id; ?>Take This Quiz').tooltip('hide');
														});
														</script>
										</tr>
										<?php } ?>
						 <?php } ?>
										</tbody>
									</table>

                                </div>
