<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelr" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 id="myModalLabelr">Remove Assignment</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger">
						Are you sure you want to remove this assignment?
					</div>
				</div>
				<div class="modal-footer">
					<form method="POST" action="delete_assignment.php">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
					</form>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button id="<?php echo $id; ?>" class="btn btn-danger remove" name="removes">Yes</button>
				</div>
			</div>
		</div>
	</div>
<!-- Modal -->
