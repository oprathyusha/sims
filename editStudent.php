<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sims");
	$query = "UPDATE student SET firstName='$_POST[firstName]' WHERE USN='$_POST[USN]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "adminDashboard.php"; //redirect to admindashboard
</script>
