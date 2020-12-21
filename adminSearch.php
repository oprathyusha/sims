<html>
    <head>
    <link rel="stylesheet" href="styles.css?v=<?php echo time();?>">
       <?php
       session_start();
      
       $connection=mysqli_connect("localhost","root","");

        $db=mysqli_select_db($connection,"sims");
      
       ?>
    </head>
    <body>
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
    </body>
</html>