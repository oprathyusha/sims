<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <b><i class="fa fa-user" aria-hidden="true"></i> UserID:&nbsp;</b><?php echo $_SESSION['userid']; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Name:&nbsp;</b><?php echo $_SESSION['name']; ?>
            </div>
            <div class="logout">
                <a href="logout.php" onclick="logout()"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout<a>
            </div>
        </center>
    </div>
    <span id="topSpan">
        <marquee behavior="" direction="">This portal is available from Dec 28 </marquee>
    </span>
    <div id=leftSide>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="searchStudent" value="Search">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="editStudent" value="Edit">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="addStudent" value="Add">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="deleteStudent" value="Delete" class="button">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="rightSide"><br><br>
        <div id="demo">
        <?php
            if(isset($_POST['searchStudent']))
            {
                ?>
                <center>
                    <form action="" method="post" id="search-modify">
                        <b>Enter USN to search:</b>
                        <input type="text" name="USN" id="usn-placeholder" placeholder="Enter your USN" required>
                        <input type="submit" name="searchStudentByUSN" value="Search" id="search-placeholder">
                    </form><br><br>
                </center>
                <?php  
            }
            if(isset($_POST['searchStudentByUSN']))
             {
                $query="select * from student where USN='$_POST[USN]'";
                $query_run=mysqli_query($connection,$query);
               
                while ($row = mysqli_fetch_assoc($query_run))
                {
                        ?>
                        <!-- ----details table----->
						 <table class="data">
                         <h1 class="details">Details:</h1>
							<tr>
								<td>
									<b>USN:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['USN']?>" disabled>
								</td>
							</tr>
							 <tr>
								<td>
									<b>First Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['firstName']?>" disabled>
								</td>
                            </tr>
                            <tr>
								<td>
									<b>Last  Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['lastName']?>" disabled>
								</td>
                            </tr>								
							<tr>
								<td>
									<b>Phone No:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['phoneNumber']?>" disabled>
								</td>
							</tr> 
							 <tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
                            <tr>
								<td>
									<b>DOB:</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['DOB'] ?>" disabled>
                                </td>
							</tr>              
                        </table> 
                
                        <!-- ----attendance table----->

                        <table class="data">
                        <h1 class="attendance">Attendance:</h1>
                        <?php
                        $query1="select * from attendance where USN='$_POST[USN]'";
                        $query_run1 =mysqli_query($connection,$query1);
                        
                        while ($row = mysqli_fetch_assoc($query_run1))
                        {
                            ?>
                        <tr>
                            <td>
                                <b>Attendance percentage in sem <?php echo $row['semester']?>:</b>
                            </td> 
                            <td>
                                <input type="text" value="<?php echo $row['averageAttendancePercentageSemWise']?>" disabled>
                            </td>
                        </tr>
                        </table>
                        <?php
                        }
                        ?> 

                        <!-- -------result table------- -->

                        <table class="data">
                        <h1 class="result">Result:</h1>
                        <?php
                        $query2="select * from result where USN='$_POST[USN]'";
                        $query_run2 =mysqli_query($connection,$query2);
                        
                        while ($row = mysqli_fetch_assoc($query_run2))
                        {
                            ?>
                            
                            <tr>
                            <td>
                                <b>sgpa in <?php echo $row['semester']?></b>
                            </td> 
                            <td>
                                <input type="text" value="<?php echo $row['sgpa']?>" disabled>
                            </td>
                        </tr>
                    </table>
                        <?php

                    }
                }
            }	
			?>
        <!-- ----------------------------edit student  ------------------------------------------        -->
        <?php
        if (isset($_POST['editStudent'])) {
        ?>
            <center>
                <form action="" method="post" id="search-modify">
                    <b>Enter USN to edit:</b>
                    <input type="text" name="USN" id="usn-placeholder" placeholder="Enter your USN" required>
                    <input type="submit" name="editStudentByUSN" value="Search" id="search-placeholder">
                </form><br><br>
            </center>
            <?php
        }
        if (isset($_POST['editStudentByUSN'])) 
        {
            $query = "select * from student where USN='$_POST[USN]'";
            $query_run = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($query_run)) 
            {
            ?>
                <form action="editStudent.php" method="post">
                    <table class="edit-data">
                    <h1 class="details">Details:</h1>
                        <tr>
                            <td>
                                <b>USN:</b>
                            </td>
                            <td>
                                <input type="text" name="USN" value="<?php echo $row['USN'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>First Name:</b>
                            </td>
                            <td>
                                <input type="text" name="firstName" value="<?php echo $row['firstName'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Last Name:</b>
                            </td>
                            <td>
                                <input type="text" name="lastName" value="<?php echo $row['lastName'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Phone No:</b>
                            </td>
                            <td>
                                <input type="text" name=" phoneNumber" value="<?php echo $row['phoneNumber'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Email:</b>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $row['email'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>DOB:</b>
                            </td>
                            <td>
                                <input type="text" name="DOB" value="<?php echo $row['DOB'] ?>" required>
                            </td>
                        </tr>
                    </table>
                    <?php
            }
            ?>
                    <table class="edit-data">
                    <h1 class="attendance">Attendance:</h1>
                        <?php
                        $query1 = "select * from attendance where USN='$_POST[USN]'";
                        $query_run1 = mysqli_query($connection, $query1);
                        while ($row = mysqli_fetch_assoc($query_run1))
                         {
                        ?>
                            <tr>
                            <td>
                                <b>Attendance percentage in <?php echo $row['semester']?> sem:</b>
                            </td> 
                            <td>
                                <input type="text" value="<?php echo $row['averageAttendancePercentageSemWise']?>" disabled>
                            </td>
                        </tr>
                           <?php
                         }       
                           ?>
                          
                    </table>
                    <!-- -------result table------- -->
                    <table class="edit-data">
                        <h1 class="result">Result:</h1>
                        <?php
                        $query2="select * from result where USN='$_POST[USN]'";
                        $query_run2 =mysqli_query($connection,$query2);
                        
                        while ($row = mysqli_fetch_assoc($query_run2))
                        {
                            ?>
                            
                            <tr>
                            <td>
                                <b>sgpa in <?php echo $row['semester']?></b>
                            </td> 
                            <td>
                                <input type="text" value="<?php echo $row['sgpa']?>" disabled>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr><td>
                        <input id="save-data" type="submit" name="edit" value="save">
                        </td>
                        </tr>
                </form>
    <?php
                        }
            
    ?>
     
        </div>
    </div>
</body>

</html>