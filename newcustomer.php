<?php
    //for new customer


    /*connecting database*/
    session_start();
    
  $connection=mysqli_connect('localhost','root','','restaurants');
   if(isset($_POST['submit'])){
      
    /*Catching data from add employee form*/
   //$_SESSION["customer_id"]=mysqli_real_escape_string($connection,$_POST['customer_id']);
  
        
        
    //$customer_id=$_SESSION['customer_id'];  
    $customer_name=mysqli_real_escape_string($connection,$_POST['customer_name']);
    $customer_contact=mysqli_real_escape_string($connection,$_POST['customer_contact']);
    $customer_address=mysqli_real_escape_string($connection,$_POST['customer_address']);
    $customer_email=mysqli_real_escape_string($connection,$_POST['customer_email']);
    $customer_dob=mysqli_real_escape_string($connection,$_POST['customer_dob']);
    $customer_password=mysqli_real_escape_string($connection,$_POST['customer_password']);
    /*insert query */
    $insert= "insert into customers values
    (' ','$customer_name','$customer_contact','$customer_address','$customer_email','$customer_dob','$customer_password')";
       
       
       
   if(mysqli_query($connection, $insert)){
            $sql="SELECT MAX(customer_id) as customer_id  FROM customers";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $id=$row['customer_id'];
                $_SESSION['customer_id']=$id;
            }
       
       
               include('shoppingcart.php');
            
        } 
    else{
           echo "ERROR: Could not able to execute $insert. " . mysqli_error($connection);
                }
       
       $customer_id=$_SESSION['customer_id'];
       $insert2="insert into bill values('','$customer_id')";
       if(mysqli_query($connection, $insert2)){
            $sql1="SELECT MAX(bill_id) as bill_id  FROM bill";
            $result1 = mysqli_query($connection, $sql1);
            while($row1 = mysqli_fetch_assoc($result1)) {
                $id1=$row1['bill_id'];
                $_SESSION['bill_id']=$id1;
            }
           include('shoppingcart.php');
       }
        else{
           echo "ERROR: Could not able to execute $insert2. " . mysqli_error($connection);
                }
           
 
 //Close connection
    } 
//end of new customer


 ?>


<html>
    <head>
        <title>New Customer</title>
    </head>
    <body>
        
    
    
    </body>

</html>