<?php 
		$connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"sims");
        $query="select * from student where USN='$_POST[USN]'";
        $query_run = mysqli_query($connection,$query);
       
if(mysqli_num_rows($query_run)>0)
{
    $query = "delete from student where USN = '$_POST[USN]'";
    $query_run = mysqli_query($connection,$query);
    $query = "delete from attendance  where USN = '$_POST[USN]'";
    $query_run = mysqli_query($connection,$query);
    $query = "delete from result  where USN = '$_POST[USN]'";
    $query_run = mysqli_query($connection,$query);
    $query = "delete from studentLogin  where USN = '$_POST[USN]'";
    $query_run = mysqli_query($connection,$query);
    ?>
    <script type="text/javascript">
    alert("Details Deleted successfully.");
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
	 	
	