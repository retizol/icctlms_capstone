<?php
 session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
/*if (!isset($_SESSION['usrid']) || (trim($_SESSION['usrid']) == '')) { ?>
location: 'index.php';
<?php
}*/
/*echo '<pre><br>';
var_dump($_SESSION);
echo '</pre>';*/

$usrid = $_SESSION['userid'];
$usruid = $_SESSION['useruid'];
$usrcid = $_SESSION['usercid'];
$usrfname = $_SESSION['userfname'];
$usrlname = $_SESSION['userlname'];
$usremail = $_SESSION['useremail'];

if (empty($usrid)) {
    header('Location: ../index.php');
}
?>
