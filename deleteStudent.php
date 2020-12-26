
<?php 
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sims");
        $query = "delete from student where USN = '$_POST[USN]'";
        $query_run = mysqli_query($connection,$query);
        $query = "delete from attendance  where USN = '$_POST[USN]'";
        $query_run = mysqli_query($connection,$query);
		$query = "delete from result  where USN = '$_POST[USN]'";
        $query_run = mysqli_query($connection,$query);
        // header("Location: adminDashboard.php")

		?>
	 	
	