<?php
if(isset($_POST['submit']))
    {
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"sims");
        $query="select * from studentlogin where studentLoginID  ='$_POST[userID]'";
        $query_run=mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)) 
        {
            if($row['studentLoginID']==$_POST['userID'])
            {
                if($row['password']==$_POST['password'])
                {

                     header("Location: studentDashboard.php");
                    
         
         
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