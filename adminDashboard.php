<!DOCTYPE html>
<html>
    <head>
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="adminDashboard.css?v=<?php echo time();?>">
       
    
       <?php
       session_start();
      
       $connection=mysqli_connect("localhost","root","");

        $db=mysqli_select_db($connection,"sims");
      
       ?>
    </head>
    <body >
    <div id="header"><br>
    <center><strong>Student management system &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>UserID:<?php echo$_SESSION['userid'];?>
    &nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
<a href="logout.php">Logout<a>
</center>
    </div>
    <span id="topSpan"><marquee behavior="" direction="">This portal is available from Dec 28 </marquee></span>
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
                    <form action="" method="post">
                        Enter USN to search:
                        <input type="text" name="USN">
                        <input type="submit" name="searchStudentByUSN" value="Search">

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
						<table>
							<tr>
								<td>
									<b>Roll No:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['USN']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['firstName']?>" disabled>
								</td>
							</tr>
						
							<tr>
								
							<tr>
								<td>
									<b>Mobile:</b>
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
							
							
						</table>
						<?php
					}
				}
			?>
                
             
        
            
            
        </div>

    </div>
    </body>
</html>