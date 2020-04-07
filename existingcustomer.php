<?php
        session_start();
        $connection=mysqli_connect('localhost','root','','restaurants');
   if(isset($_POST['submit'])){
        $existing_customer_id=mysqli_real_escape_string($connection,$_POST['customer_id']);
        $existing_customer_password=mysqli_real_escape_string($connection,$_POST['customer_password']);
        
        
        $query="select customer_id,customer_password from customers";
        $result=mysqli_query($connection,$query);  
            if($result){
						if(mysqli_num_rows($result)>0){
							while($ans=mysqli_fetch_array($result)){
		                              if($ans['customer_id']==$_POST['customer_id'] && $ans['customer_password']==$_POST['customer_password']){
                                         $_SESSION['customer_id']=$_POST['customer_id'];
                                          
                                          
         
                                          
                                          include('shoppingcart.php');
                                          
                                      }
    }
}
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
       
       
} 

  

mysqli_close($connection);
?>


<html>
    <head>
        <title>Existing Customer</title>
    </head>
    <body>
        
    <h1>Wrong User OR Wrong Password</h1>
    
    </body>

</html>