<!DOCTYPE html>
<html>
    <head>
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time();?>">
       
    </head>
    <body class="test">
    <div id="header">
    <center><strong>Student management system &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>email:admin@kssem.edu.in name:admin
    &nbsp;&nbsp;&nbsp; 
<a href="logout.php">Logout<a>
</center>
    </div>
    <span id="topSpan"><marquee behavior="" direction="">This poratl is open till dec </marquee></span>
    <div id=leftSide>
     <form action="" method="post">
         <table>
            <tr>
                 <td>
                     <input type="submit" name="searchStudent" value="search">
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
    <div id="rightSide">

    </div>
    </body>
</html>