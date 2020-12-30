<?php
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sims");
		$query="select * from student where USN='$_POST[USN]'";
		$query_run = mysqli_query($connection,$query);
   
if(mysqli_num_rows($query_run)>0)
{
	$query = "update student set firstName='$_POST[firstName]',lastName='$_POST[lastName]',
	phoneNumber=$_POST[phoneNumber],email='$_POST[email]',DOB='$_POST[DOB]',semester=$_POST[semester],
	departmentID=$_POST[departmentID]
	 where USN='$_POST[USN]'";
	$query_run = mysqli_query($connection,$query);

	$query  = "update attendance set semester1=$_POST[semester1],semester2=$_POST[semester2],
	semester3=$_POST[semester3],semester4=$_POST[semester4],semester5=$_POST[semester5],
	semester6=$_POST[semester6],semester7=$_POST[semester7],semester8=$_POST[semester8] where USN='$_POST[USN]'";
	$query_run = mysqli_query($connection,$query);
	   
	$query  = "update result set sgpa1=$_POST[sgpa1],sgpa2=$_POST[sgpa2],
	sgpa3=$_POST[sgpa3],sgpa4=$_POST[sgpa4],sgpa5=$_POST[sgpa5],
	sgpa6=$_POST[sgpa6],sgpa7=$_POST[sgpa7],sgpa8=$_POST[sgpa8] where USN='$_POST[USN]'";
	$query_run = mysqli_query($connection,$query);
	?>
	<script type="text/javascript">
	alert("Details Edited successfully.");
	</script>
   <?php
	}
	else
	{
		?>
		<script>alert("student does'nt exists");</script>
		<?php
	}
 		?>
<script>
	window.location.href = "adminDashboard.php"; //redirect to admindashboard
</script>
