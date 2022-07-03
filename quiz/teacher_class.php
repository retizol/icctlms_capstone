

						<ul	 id="da-thumbs" class="da-thumbs">
										<?php $query = mysqli_query($conn,"SELECT * from teacher_class
										where teacher_id = '$usrid' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];

										?>
											<li id="del<?php echo $id; ?>">
												<a href="my_students.php<?php echo '?id='.$id; ?>">
														<img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid" alt="">
													<div>
													<span><p><?php echo $row['class_name']; ?></p></span>
													</div>
												</a>
												<p class="class"><?php echo $row['class_name']; ?></p>
												<p class="subject"><?php echo $row['subject_code']; ?></p>
												<a href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>

											</li>
											<!-- Modal -->
									<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
											<h3 id="myModalLabel">Remove Class</h3>
										</div>
											<div class="modal-body">
											<div class="alert alert-danger">
												Are you sure you want to Remove this class?
											</div>
											</div>
										<div class="modal-footer">
											<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
											<button id="<?php echo $id; ?>" class="btn btn-danger remove" name="change"><i class="icon-check icon-large"></i> Yes</button>
										</div>
									</div>
													<!-- Modal -->
									<?php } }else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> No Class Currently Added</div>
									<?php  } ?>
									</ul>
