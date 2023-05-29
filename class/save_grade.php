<?php
include '../includes/dbh.inc.php';

$id = $_POST['id'];
$post_id = $_POST['post_id'];
$get_id = $_POST['get_id'];
$grade = $_POST['grade'];
mysqli_query($conn,"UPDATE student_assignment SET grade = '$grade' WHERE student_assignment_id = '$id'");
?>
<script>
 window.location = 'view_submit_assignment.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>';
</script>
