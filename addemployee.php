<?php
    /*connecting database*/
        $connection=mysqli_connect('localhost','root','','restaurants');


if(isset($_POST['submit'])){

    /*Catching data from add employee form*/
    $eid=mysqli_real_escape_string($connection,$_POST['eid']);
    $ename=mysqli_real_escape_string($connection,$_POST['ename']);
    $eaddress=mysqli_real_escape_string($connection,$_POST['eaddress']);
    $econtact=mysqli_real_escape_string($connection,$_POST['econtact']);
    $ebloodgroup=mysqli_real_escape_string($connection,$_POST['ebloodgroup']);
    $ejdate=mysqli_real_escape_string($connection,$_POST['ejdate']);
    $edesignation=mysqli_real_escape_string($connection,$_POST['edesignation']);
    /*insert query */
    $insert= "insert into employee values('$eid','$ename','$eaddress','$econtact','$ebloodgroup','$ejdate','$edesignation')";
    if(mysqli_query($connection, $insert)){
                echo "Records inserted successfully.";
                include("update.php");
        } 
    else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($connection);
                }



}
 
// Close connection
mysqli_close($connection);
    
?>


<html>
    <head>
        <title>Add Employee</title>
    </head>
    <body>
        
    
    
    </body>

</html>