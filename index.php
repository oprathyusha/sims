<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin and Student login form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
    <div >
        <div class="form-box">
        <div class="button-box">
        <div id="btn"></div>
            <button type="button"class="toggle-btn" onclick="admin()">Admin</button>
            <button type="button"class="toggle-btn" onclick="student()">Student</button>
        </div>
            <form action = " " method="post" id="admin"class="input-group"  >
                <input type="text" class="input-field" name='userID' placeholder="User Id" required>
                <input type="password" class="input-field" name="Password" placeholder="Enter Password" required>
                <br><br>
             <input type="submit" class="submit-btn" name="adminSubmit" value="logIn">
            </form>
            
            <form action=" " method ="post" id="student" class="input-group" >
                <input type="text" class="input-field" name ="userID" placeholder="Student login Id" required>
                <input type="password" class="input-field" name ="password" placeholder="Enter Password" required>
                 <input type="submit" class="submit-btn" name="submit" value="Login">
                 <br><br>
            </form>
        </div>
       
    </div>
    <script>
        var x= document.getElementById("admin");
        var y= document.getElementById("student");
        var z= document.getElementById("btn");
        
        function student(){
            x.style.left="-400px"
            y.style.left="50px"
            z.style.left="110px"
        }
        function admin(){
            x.style.left="50px"
            y.style.left="450px"
            z.style.left="0px"
        }
    </script>
    <?php include "adminLogin.php"?>
    <?php include "studentLogin.php"?>


   
</body>
</html>