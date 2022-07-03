<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
?>
    <body>

                <div>
										<?php include('teacher_class.php'); ?>
                                </div>
                            <!-- /block -->


									<script type="text/javascript">
									$(document).ready( function() {
										$('.remove').click( function() {
										var id = $(this).attr("id");
											$.ajax({
											type: "POST",
											url: "delete_class.php",
											data: ({id: id}),
											cache: false,
											success: function(html){
											$("#del"+id).fadeOut('slow', function(){ $(this).remove();});
											$('#'+id).modal('hide');
											$.jGrowl("Your Class is Successfully Deleted", { header: 'Class Delete' });
											}
											});
											return false;
										});
									});
									</script>

		<?php include('script.php'); ?>
    </body>
</html>
