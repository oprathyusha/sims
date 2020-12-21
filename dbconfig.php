<?php
    $con=mysqli_connect("localhost","root","");
    if(!$con)
        die("Not able to connect with Database");
    mysqli_select_db($con,"sims");
    ?>