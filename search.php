<?php
$query = "select * from student where USN='$_POST[USN]'";
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
                    <tr>
                        <td>
                            <b>semester:</b>
                        </td>
                        <td>
                            <input type="text" name="semester" value="<?php echo $row['semester'] ?>"disabled>
                        </td>
                    </tr>
                    <?php
                  
                   $query = "SELECT department.departmentName
                   FROM department
                   INNER JOIN student ON 
                   department.departmentID = student.departmentID
                   where USN='$_POST[USN]'";
                   $query_run = mysqli_query($connection, $query);
           
                   while ($row = mysqli_fetch_assoc($query_run)){
                   ?>
                   <tr>
                        <td>
                            <b>Department :</b>
                        </td>
                        <td>
                            <input type="text" name="department" value="<?php echo $row['departmentName']?> " disabled>
                        </td>
                    </tr>
                    <?php
                   }
                   ?>  
                </table>
       <?php}
       ?>