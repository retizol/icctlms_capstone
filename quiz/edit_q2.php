<div class="qDivSelect form-check" id="2">
	<input name="correct" <?php if($row['answer'] == 'True'){ echo 'checked'; }?> value="True" type="radio">True<br /><br />
	<input name="correct" <?php if($row['answer'] == 'False'){ echo 'checked'; }?> value="False" type="radio">False<br /><br />
</div>
