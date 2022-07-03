<?php
 session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
/*if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php
}*/


$usrid = $_SESSION['userid'];
$usruid = $_SESSION["useruid"];
$usrcid = $_SESSION["usercid"];
$usrfname = $_SESSION["userfname"];
$usrlname = $_SESSION["userlname"];
$usremail = $_SESSION["useremail"];

$user_query = mysqli_query($conn,"select * from users where usersId = '$usrid'")or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
//$user_username = $user_row['useruid'];
?>
