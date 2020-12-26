<?php
session_start();
$userID =$_SESSION['userid'];
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sims");
	$query="select USN from student where USN='$_POST[USN]'";
	
	$query_run = mysqli_query($connection,$query);
	if(mysqli_num_rows($query_run)>0){
		?>
		<script>alert("student already exists");</script>
		<?php
	}
		else
		{
			$query = "insert into student values('$_POST[USN]','$_POST[firstName]','$_POST[lastName]',$_POST[phoneNumber],
			'$_POST[email]','$_POST[DOB]',$_POST[semester],'$userID','$_POST[USN]',$_POST[departmentID])";
		$query  = " insert into  attendance values( '$_POST[USN]','$_POST[firstName] $_POST[lastName]',$_POST[semester1],$_POST[semester2],
	$_POST[semester3],$_POST[semester4],$_POST[semester5],
	$_POST[semester6],$_POST[semester7],$_POST[semester8],$_POST[departmentID])";
	$query_run = mysqli_query($connection,$query);
	
	$query  = " insert into  result values( '$_POST[USN]',$_POST[sgpa1],$_POST[sgpa2],
	$_POST[sgpa3],$_POST[sgpa4],$_POST[sgpa5],
	$_POST[sgpa6],$_POST[sgpa7],$_POST[sgpa8],$_POST[departmentID])";
	$query_run = mysqli_query($connection,$query);
?>
<?php
		}
		?>

<script type="text/javascript">
	
	window.location.href = "adminDashboard.php"; //redirect to admindashboard
</script>
