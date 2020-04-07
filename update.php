<!--for addin product into database-->
<?php  

   
                     //connection
       $connection=mysqli_connect('localhost','root','','restaurants');

    if(isset($_POST['upload'])){
    
        $file = $_FILES['file'];
        
        $filename=$_FILES['file']['name'];
        $filetmpname=$_FILES['file']['tmp_name'];
        $filesize=$_FILES['file']['size'];
        $fileerror=$_FILES['file']['error'];
        $filetype=$_FILES['file']['type'];

        
        $fileext=explode('.',$filename);
        $fileactualextension=strtolower(end($fileext));
        
        $allowed=array('jpg','jpeg','png','pdf');
        
        if(in_array($fileactualextension,$allowed)){
            if($fileerror===0){
                if($filesize<100000){
                    $filenamenew=$_POST['product_name']."."."$fileactualextension";
                    $_SESSEION['filenamenew']=$filenamenew;
                    $filedestination=$filenamenew;
                    move_uploaded_file($filetmpname,"images2/$filedestination");
            
                    
                 
                    
                    
                    
    /*Catching data for  add product*/
    $product_name=mysqli_real_escape_string($connection,$_POST['product_name']);
    $product_price=mysqli_real_escape_string($connection,$_POST['product_price']);
    
    
    /*insert query */
    $insert= "insert into products values('','$product_name','$filenamenew','$product_price')";
    if(mysqli_query($connection, $insert)){
                echo "Product Inserted Succesfully";
            
        } 
    else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($connection);
                }
     /* end insert query */

                }
                else{
                    echo "big size";
                }
            }
            else{
                "not uploaded because error";
            }
            
        }
        else{
            echo "you can not upload file of this type";
        }
        
    }







//searching a product

    if(isset($_POST['search'])){
    $product_name=$_POST['product_name'];
            
        
        
        $query="select name,id,price from products where name like '$product_name%_%_%'";
        $result=mysqli_query($connection,$query);  
            if($result){
						if(mysqli_num_rows($result)>0){
							while($ans=mysqli_fetch_array($result)){
		                          echo $ans['name']." ";
		                          echo $ans['id']." ";
		                          echo $ans['price']." ";
                                    ?>
                                        <a href="#edit">Edit</a>
                                    <?php
                                echo "<br>";
                                
                                
    }
}
}
    }
//editing product
 if(isset($_POST['edit'])){
            $product_id=$_POST['product_id'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
     echo $product_id."<br>".$product_name."<br>".$product_price;
                $query="update products set name='$product_name', price='$product_price' where id='$product_id'";
        $result=mysqli_query($connection,$query);
     if(!$result){
         echo "unsuccess";
     }
     else{ echo "Successful";}
        
       
                                
                                
    }






//deleting a product

    if(isset($_POST['delete'])){
   
            
        
        $id=$_POST['product_id'];
        $query="delete from products where id='$id'";
    
        $result=mysqli_query($connection,$query); 
        if($result){
            echo "Product Deleted Successfully";
        }
     
}


//deleting employee

if(isset($_POST['delete_employee'])){
   
            
        
        $id=$_POST['employee_id'];
        $query="delete from employee where eid='$id'";
    
        $result=mysqli_query($connection,$query); 
        if($result){
            echo "employee Deleted Successfully";
        }
     
}









//searching a employee

    if(isset($_POST['search_employee'])){
    $employee_id=$_POST['employee_id'];
            
        
        
        $query="select eid,ename,eaddress,econtact,designation from employee where eid= '$employee_id'";
        $result=mysqli_query($connection,$query);  
            if($result){
						if(mysqli_num_rows($result)>0){
							while($ans=mysqli_fetch_array($result)){
		                          echo $ans['eid']." ";
		                          echo $ans['ename']." ";
		                          echo $ans['eaddress']." ";
                                echo $ans['econtact']." ";
                                echo $ans['designation']." ";
                                    ?>
                                        <a href="#edit_employee">Edit</a>
                                    <?php
                                echo "<br>";
                                
                                
    }
}
}
    }







//editing employee
 if(isset($_POST['edit_employee'])){
            $employee_id=$_POST['employee_id'];
            $employee_name=$_POST['employee_name'];
            $employee_address=$_POST['employee_address'];
            $employee_contact=$_POST['employee_contact'];
            $employee_desig=$_POST['employee_desig'];
     echo $employee_id."<br>".$employee_name."<br>".$employee_address."<br>".$employee_contact."<br>".$employee_desig;
                $query="update employee set eid='$employee_id',ename='$employee_name',eaddress='$employee_address',econtact='$employee_contact',designation='$employee_desig'";
        $result=mysqli_query($connection,$query);
     if(!$result){
         echo "unsuccess";
     }
     else{ echo "Successful";}
        
       
                                
                                
    }



    

?>


<html>
    <head>
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" type="text/css" href="connect.css">
         <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="update.css">
     

     <!-- MAIN CSS -->

        <style>
            body{
                
                
            }
            ul li a{
                text-decoration: none;
                color: black;
                padding: 10px;
                margin: 10px;
                margin-top: 20px;
                
            }
            ul li {
                float: left;
                margin: 10px;
                list-style: none;
            }
            ul li:hover{
                display: block;
                color: red;
                background-color:red;
                
               
            }
        </style>
    </head>
    
    <body>
        
         
                    
        
        
         <div style="background-color:black;color:white;padding:5px;">
                    <caption><center><h style="text-decoration:none; color:Red;font-size:30px;"><b>WELCOME TO THE ADMIN PAGE</b></h></center> </caption>
                    </div> 
        <br>
        
 
        
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
                    <a class="navbar-brand" href="#">ADMIN</a>
    </div>
    <ul class="nav navbar-nav">
                        <li class="active"><a href="rms.php">Home</a></li>
      
                        <li><a href="#addproduct" class="smoothScroll" style="font-size:20px">Add Product</a></li>
                         <li><a href="#updateproduct" class="smoothScroll" style="font-size:20px">Update Product</a></li>
                         <li><a href="#deleteproduct" class="smoothScroll" style="font-size:20px">Delete Product</a></li>
                      
                         <li><a href="#addemployee" class="smoothScroll" style="font-size:20px">ADD Employee</a></li>
                         
                        <li><a  href="#deleteemployee" class="smoothScroll" style="font-size:20px">Delete Employee</a></li>
                        <li><a  href="#updateemployee" class="smoothScroll" style="font-size:20px">Update Employee</a></li>
    </ul>
    </div>
    </nav>
        
        
   <br>     
        
            
 
    
        
        
        
        
                              <!--add product-->
 <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="addproduct" class="overlay">
                    <div class="popup" style="width:40%; height:60%;" >
		              <center><h2>Add product</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">
                
                                        <label for="pname">Product Name</label>
                                        <input type="text" name="product_name" id="pname">
                                        <br>
                                        <label for="pprice">Product Price</label>
                                        <input type="text" name="product_price" id="pprice">
                                        <br>
                                        <br>
                                        <input type="file" name="file">
                                        <br>
                                        <button type="submit" name="upload" style="color:black;">Upload</button>
            
                                    </form>               
                        
                        
                         </div>
	               </div>
                </div>
            </div>   
        </div>
    </div>
</section>
        <!-- update product-->
         <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="updateproduct" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Search</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form method="post" action="update.php">
                                        <input type="text" name="product_name">
                                        <button type="submit" name="search">
                                            Search
                                        </button>
                                    </form>              
                                </div>
                            <div class="col-lg-3"></div>

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section>
        <!--Edit-->
            <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="edit" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Edit</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">
                                        <input type="text" name="product_id" placeholder="Enter Product Id">
                                        <input type="text" name="product_name" placeholder="Replace Product name">
                                        <input type="text" name="product_price" placeholder="Replace product price">
                                        <input type="file" name="file">
                                        <button type="submit" name="edit">
                                            Edit
                                        </button>
                                    </form>              
                                </div>
                            <div class="col-lg-3"></div>

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section>
    
        <!--Delete product-->
         <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="deleteproduct" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Delete</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form method="post" action="update.php">
                                        <input type="text" name="product_id" placeholder="Enter your product id">
                                        <button type="submit" name="delete">
                                            Delete
                                        </button>
                                    </form>              
                                </div>
                            <div class="col-lg-3"></div>

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section>   
        
        
        
          <!-- Add EMPLOYEE-->
        
        
        
        
        <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="addemployee" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Add Employee</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                           <div class="col-lg-3"></div>
                                                   <div class="col-lg-6">
                                        
                                                        <form class="form-group" method="POST" action="addemployee.php">
                                                              <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                              <label>ID: </label>
                                                              <input type="text" name="eid" class="form-control" placeholder="Enter ID">
                                                                </div>

                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Name: </label>
                                                              <input type="text" name="ename" class="form-control"  placeholder="Name">
                                                               </div>
                                                             </div>
                                                             <br>
                                                              <label>Address</label>
                                                              <input type="text" name="eaddress" class="form-control" placeholder="Enter Adress">
                                                               
                                                                <br>
                                                              <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Contact</label>
                                                              <input type="text" name="econtact" class="form-control" placeholder="Enter Contact" >
                                                                </div>

                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Blood Group</label>
                                                              <input type="text" name="ebloodgroup" class="form-control" placeholder="Enter blood group">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Joining Date</label>
                                                              <input type="date" name="ejdate" class="form-control">
                                                               </div>
                                                              </div>
                                                             <br>
                                                             <label>Designation</label>
                                                              <input type="text" name="edesignation" class="form-control" placeholder="Enter Designation">
                                                              <br>
                                                              <input type="submit" name="submit" value="Add" class="btn btn-warning btn-block btn-lg" style="box-shadow: 2px 2px 2px gray;"onclick="warn();">

                                                        </form>                                                   
                                                       
                                                    
                                                    </div>
                                                <div class="col-lg-3"></div>
                                                

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section>
        
        
        
        
        <!--delete employee-->
        
        <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="deleteemployee" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Delete</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form method="post" action="update.php">
                                        <input type="text" name="employee_id" placeholder="Enter your employee id">
                                        <button type="submit" name="delete_employee">
                                            Delete
                                        </button>
                                    </form>              
                                </div>
                            <div class="col-lg-3"></div>

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section> 
      
      
        
        
         <!-- update employee-->
         <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="updateemployee" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Search</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form method="post" action="update.php">
                                        <input type="text" name="employee_id">
                                        <button type="submit" name="search_employee">
                                            Search
                                        </button>
                                    </form>              
                                </div>
                            <div class="col-lg-3"></div>

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section>
        <!--Edit employee-->
            <section id="" style="height: 600px">
        <div class="container">
            <div class="row">
                <div id="edit_employee" class="overlay">
                    <div class="popup" style="width:40%; height:80%;">
		              <center><h2>Edit</h2></center>
		                  <a class="close" href="#employee">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">                    
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">
                                        <input type="text" name="employee_id" placeholder="Enter employee Id">
                                        <input type="text" name="employee_name" placeholder="Replace employee name">
                                        <input type="text" name="employee_address" placeholder="Replace address">
                                        <input type="text" name="employee_contact" placeholder="Replace contact">
                                        <input type="text" name="employee_desig" placeholder="Replace designation">
                                        
                                        <button type="submit" name="edit_employee">
                                            Edit
                                        </button>
                                    </form>              
                                </div>
                            <div class="col-lg-3"></div>

                         </div>
	               </div>
                </div>
            </div>   
        </div>
</section>
        
        
        
        
    </body>

</html>