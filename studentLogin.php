<?php
session_start();
if(isset($_POST['submit']))
    {
        session_start();
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
                     $_SESSION['USN'] =  $row['studentLoginID'];
                             ?>
                             <script>alert("login successful");</script>
                             <?php
                     header("Location: studentDashboard.php");
                }
                else
                {
               ?>
               <script> alert("wrong password");</script>
               <?php
            }
        }
            else
            ?>
            <script>alert("wrong login id");</script>
            <?php
        }
    }
    ?>