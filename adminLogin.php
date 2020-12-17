<?php
    if(isset($_POST['adminSubmit']))
    {
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"sims");
        $query="select * from adminlogin where userID='$_POST[userID]'";
        $query_run=mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)) 
        {
            if($row['userID']==$_POST['userID'])
            {
                if($row['Password']==$_POST['Password'])
                {

                    header("Location: adminDashboard.php");
         
                }
                else
                {
                echo"WRONG PASSWORD";
            }
        }
            else
            echo"WRONG USERID";
        }
    }
    ?>