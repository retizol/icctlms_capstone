<?php
include '../includes/dbh.inc.php';
if (isset($_POST['backup_delete'])){
$get_id=$_GET['id'];
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysqli_query($conn,"DELETE FROM class_quiz WHERE class_quiz_id='$id[$i]'");
}
?>
<script>
	window.location = "thisclass.php<?php echo '?id='.$get_id; ?>"
</script>
<?php
}
?>
