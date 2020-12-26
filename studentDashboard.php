<!DOCTYPE html>
<html>

<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="adminDashboard.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <?php
    session_start();
    $USN=" ";
   
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "sims");
    ?>

</head>
<body>
    <div id="header"><br>
        <center>
            <div class="logo">
                Student Management System
            </div>
            <div class="info">
                <b><i class="fa fa-user" aria-hidden="true"></i> UserID:&nbsp;</b><?php echo $_SESSION['USN']; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
            </div>
            <div class="logout">
                <a href="logout.php" onclick="logout()"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout<a>
            </div>
        </center>
    </div>

    <div id="rightSide"><br><br>
        <div id="demo">
<?php
    
    
        $query = "select * from student where studentLoginID='$_SESSION[USN]'";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run))
         {
        ?>
         
            <!---------details table--------->
                <table class="data">
                    <h1 class="details">Details:</h1>
                    <tr>
                        <td>
                            <b>USN:</b>
                        </td>
                        <td>
                            <input type="text" name="USN" value="<?php echo $row['USN'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>First Name:</b>
                        </td>
                        <td>
                            <input type="text" name="firstName" value="<?php echo $row['firstName'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Last Name:</b>
                        </td>
                        <td>
                            <input type="text" name="lastName" value="<?php echo $row['lastName'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Phone No:</b>
                        </td>
                        <td>
                            <input type="text" name=" phoneNumber" value="<?php echo $row['phoneNumber'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email:</b>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row['email'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>DOB:</b>
                        </td>
                        <td>
                            <input type="text" name="DOB" value="<?php echo $row['DOB'] ?>"disabled>
                        </td>
                    </tr>
                    <?php
                  
                   $query = "SELECT department.departmentName
                   FROM department
                   INNER JOIN student ON 
                   department.departmentID = student.departmentID
                   where USN='$_SESSION[USN]'";
                   $query_run = mysqli_query($connection, $query);
           
                   while ($row = mysqli_fetch_assoc($query_run)){
                   ?>
                   <tr>
                        <td>
                            <b>Semester:</b>
                        </td>
                        <td>
                            <input type="text" name="department" value="<?php echo $row['departmentName']?> " disabled>
                        </td>
                    </tr>
                    <?php
                   }
                   ?>  
                </table>
            <?php
        }
            ?>

            <?php
        $query = "select * from attendance where USN='$_SESSION[USN]'";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run))
        {
            ?>
            <!---------attendance table--------->
                <table class="data">
                    <h1 class="attendance">Attendance:</h1>
                    <tr>
                        <td>
                            <b>Semester 1:</b>
                        </td>
                        <td>
                            <input type="text" name="semester1" value="<?php echo $row['semester1'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 2:</b>
                        </td>
                        <td>
                            <input type="text" name="semester2" value="<?php echo $row['semester2'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 3:</b>
                        </td>
                        <td>
                            <input type="text" name="semester3" value="<?php echo $row['semester3'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 4:</b>
                        </td>
                        <td>
                            <input type="text" name=" semester4" value="<?php echo $row['semester4'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 5:</b>
                        </td>
                        <td>
                            <input type="text" name="semester5" value="<?php echo $row['semester5'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 6:</b>
                        </td>
                        <td>
                            <input type="text" name="semester6" value="<?php echo $row['semester6'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 7:</b>
                        </td>
                        <td>
                            <input type="text" name="semester7" value="<?php echo $row['semester7'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 8:</b>
                        </td>
                        <td>
                            <input type="text" name="semester8" value="<?php echo $row['semester8'] ?>"disabled>
                        </td>
                    </tr>
                </table>
            <?php
        }
            ?>
            
            <?php
        $query = "select * from result where USN='$_SESSION[USN]'";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run))
        {
            ?>
            <!---------result table--------->
                <table class="data">
                    <h1 class="result">Result:</h1>
                    <tr>
                        <td>
                            <b>Semester 1:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa1" value="<?php echo $row['sgpa1'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 2:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa2" value="<?php echo $row['sgpa2'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 3:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa3" value="<?php echo $row['sgpa3'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 4:</b>
                        </td>
                        <td>
                            <input type="text" name=" sgpa4" value="<?php echo $row['sgpa4'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 5:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa5" value="<?php echo $row['sgpa5'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 6:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa6" value="<?php echo $row['sgpa6'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 7:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa7" value="<?php echo $row['sgpa7'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Semester 8:</b>
                        </td>
                        <td>
                            <input type="text" name="sgpa8" value="<?php echo $row['sgpa8'] ?>"disabled>
                        </td>
                    </tr>
                </table>
            <?php
        }
   
            ?>
