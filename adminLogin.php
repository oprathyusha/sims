<?php
      session_start();
        //session is a way to store information (in variables) to be used across multiple pages. Unlike a cookie, the information is not stored on the users computer.
        //session is created when loggen in and session is destroyed when logged out.
      $userid=" ";
      $name=" ";
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
                    $_SESSION['userid']=$row['userID'];
                    $_SESSION['name']=$row['adminName'];
                    header("Location: adminDashboard.php");
                 }
                else
                {
                ?>
                <script>alert("Wrong password");
                </script>
                <?php
            }
        }
            else
            ?>
            <script>alert("Wrong user id");</script>
            <?php
        }
    }
    ?>