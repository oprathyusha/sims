<!DOCTYPE html>
<html>

<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="adminDashboard.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.ico" type="image/x-icon">
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
                <b>UserID:&nbsp;</b><?php echo $_SESSION['userid']; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Name:&nbsp;</b><?php echo $_SESSION['name']; ?>
            </div>
            <div class="logout">
                <a href="logout.php" onclick="logout()">Logout<a>
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
    <div class="extra">
        
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
						 <table class="data">
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
									<input type="text" value="<?php echo $row['DOB']?>" disabled>
								</td>
							</tr>              
                        </table> 
                
                        <!-- ----attendance table---                     -->

                         <table class="data">
                        <h1>attendance</h1>
                        <?php
                        $query1="select * from attendance where USN='$_POST[USN]'";
                        $query_run1 =mysqli_query($connection,$query1);
                        
                        while ($row = mysqli_fetch_assoc($query_run1))
                        {
                            ?>
                            
                            <tr>
                            <td>
                                <b>Attendance:</b>
                            </td> 
                            <td>
                                <input type="text" value="<?php echo $row['semester']?>" disabled>
                            </td>
                        </tr>
                    
                        <tr>
                            
                        <tr>
                            <td>
                                <b>attendance percentage in <?php echo $row['semester']?></b>
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
                        <h1>Result</h1>
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
        
        <!-- ----------------------------edit student  ------------------------------------------        -->
        <?php
        if (isset($_POST['editStudent'])) {
        ?>
            <center>
                <form action="" method="post" id="search-modify">
                    <b>Enter USN to search:</b>
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
                    <table class="data">
                        <tr>
                            <td>
                                <b>USN:</b>
                            </td>
                            <td>
                                <input type="text" name="USN" value="<?php echo $row['USN'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>First Name:</b>
                            </td>
                            <td>
                                <input type="text" name="firstName" value="<?php echo $row['firstName'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Last Name:</b>
                            </td>
                            <td>
                                <input type="text" name="lastName" value="<?php echo $row['lastName'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Phone No:</b>
                            </td>
                            <td>
                                <input type="text" name=" phoneNumber" value="<?php echo $row['phoneNumber'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Email:</b>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $row['email'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>DOB:</b>
                            </td>
                            <td>
                                <input type="text" name="DOB" value="<?php echo $row['DOB'] ?>">
                            </td>
                        </tr>
                    </table>
                    <?php
            }
            ?>
                    <table class="data">
                        <?php
                        $query1 = "select * from attendance where USN='$_POST[USN]'";
                        $query_run1 = mysqli_query($connection, $query1);
                        while ($row = mysqli_fetch_assoc($query_run1))
                         {
                        ?>
                            <tr>
                                <td>
                                    <b>attendace:</b>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $row['semester'] ?>">
                                </td>
                            </tr>
                           <?php
                         }       
                           ?>    
                          
                    </table>
                    <!-- -------result table------- -->
                    <table class="data">
                        <h1>Result</h1>
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
                        <input type="submit" name="edit" id="" value="save">
                        </td>
                        </tr>
                </form>
    <?php
                        }
            
    ?>
     
        </div>
    </div>



    <!-- <script>
        function logout() {
            var reallyLogout = confirm("Do you really want to log out?");
            confirmed = confirm('Are you sure you want to log out?');
            (confirmed) ?
            return true: return false);
        var el = document.getElementById("logout");
        if (el.addEventListener) {
            el.addEventListener("click", logoutfunction, false);
        } else {
            el.attachEvent('onclick', logoutfunction);
        }
    </script> -->
</body>

</html>