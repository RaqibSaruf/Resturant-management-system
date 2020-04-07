<?php
    //for new customer


    /*connecting database*/
    session_start();
    
  $connection=mysqli_connect('localhost','root','','restaurants');
  


 ?>

<html>
    <head>
        <title>Customer Order Details</title>
        
        <style>

thead {color:darkred;}
tbody {color:blue;}
tfoot {color:red;}            


</style>
        
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="register.css">
	
          
     <link rel="stylesheet" href="css/templatemo-style.css">

    </head>
    
    
    <body style="background-color:black">
        
        
        <div>
        <div style="background-color:black;color:white;padding:25px;">
                    <caption><center><h style="text-decoration:underline; color:Red;font-size:30px;"><b>PURCHASED</b></h></center> </caption>
                    </div>
        
   
                    
                <table style="background-color:yellow;width:60%" frame="below" cellspacing="30">
                    <tr>
                        <td><h4><b>Date:</b></h4></td>
                        <td style="font-size:20px;"><?php echo $order_date= date('d/m/y');?></td>                   
                    </tr>
                    
                     <tr>
                        <td><h4><b>Customer_ID:</b></h4></td>
                        <td style="font-size:20px;" ><?php echo $_SESSION["customer_id"]; ?></td>  
                         <td><h4><b>BILL_ID:</b></h4></td>
                        <td style="font-size:20px;" ><?php echo $_SESSION["bill_id"]; ?></td> 
                    </tr>
                                    
                    
                    	<?php
					$connect=mysqli_connect('localhost','root','','restaurants');
					$query="select * from customers where customers.customer_id=".$_SESSION['customer_id'];                    
					$result=mysqli_query($connect,$query);
					if($result){
						if(mysqli_num_rows($result)>0){
							while($detail=mysqli_fetch_assoc($result)){
								?>
                    
                    <tr>
                        <td><h4><b>Customer_Name:</b></h4></td>
                        <td style="font-size:20px;"><?php echo $detail['customer_name']; ?></td> 
                        <td><h5>Contact:</h5></td>
                        <td><?php echo $detail['customer_contact']; ?></td>                       
                    </tr>
                    <tr>
                        <td><h5>Address:</h5></td>
                        <td><?php echo $detail['customer_address']; ?></td> 
                    </tr>
                    <tr>
                        <td><h5>Email:</h5></td>
                        <td><?php echo $detail['customer_email']; ?></td> 
                    </tr>
            
                    
                    <?php
						}
					}
				}
			?>
                    </table>
                    
                             
                   
				<table style="background-color:navajowhite;" frame="box" cellspacing="20" border="10|4">                    
                    
                    
                    <thead>
					<tr> 
                        
                        <td width="15%"><h4>PRODUCT_ID</h4></td>
                        <td width="15%"><h4>PRODUCT_NAME</h4></td>                        
                        <td width="15%"><h4>PRODUCT_QUANTITY</h4></td>
                        <td width="15%"><h4>PRICE</h4></td>
                        <td width="15%"><h4>TOTAL</h4></td>
												
					</tr>
                    </thead>
					<?php
                    
						if(!empty($_SESSION['shopping_cart'])){
							$total=0;
							foreach($_SESSION['shopping_cart'] as $key=>$product){
            
					?>

							<tr> 
                                
				                <td style="font-size:20px;"><?php echo $product['id']; ?></td>
                                <td style="font-size:20px;"><?php echo $product['name'];?></td>								
								<td style="font-size:20px;"><?php echo $product['quantity']; ?></td>
								<td style="font-size:20px;">TK<?php echo $product['price']; ?></td>
								<td style="font-size:20px;">
                                    Tk
                                    <?php 
                                        echo number_format($product['quantity']*$product['price'],2);
                                    ?>
                                </td>                               
                           					                      
                              
							</tr>
								<?php 
									$total=$total+($product['quantity']*$product['price']);
                                
                                
                                $a=$_SESSION["customer_id"];
                            
								$_SESSION['quan']= $product['quantity']; 
								$_SESSION['pri']=$product['price'];
                            
                                 $_SESSION['tota']=number_format($product['quantity']*$product['price'],2);
                                
                                                            
                                
								}
                    

								 ?>
                    <tfoot>
                                <tr>
                                    <td colspan="1" align="center" style="font-size:30px;"><b>NET Total</b></td>
									<td colspan="4" style="font-size:30px;"><?php echo number_format($total,2);?>TK</td>

								</tr>
                    </tfoot>
								
								<?php
							}
							?>
                    
                            
                    
                    
                </table>
            
        </div>
        
        <div>
        
        
                            
                            <?php
                                    if(!empty($_SESSION['shopping_cart'])){
                                        ?>
        
                            <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-nav-first">
        
                                        <center><button style="border-radius:25%;">
                                <a style="text-decoration:none; color:red;font-size:30px;" href="shoppingcart.php?action=delete1&id= <?php 
                                echo $product['id']; ?> "/>
                                
                                DONE
                           
                            </button>
                            </center> 
                                
            </ul>
            <ul class="nav navbar-nav navbar-nav-first">
        
                                        <center><button style="border-radius:25%;">
                                <a style="text-decoration:none; color:red;font-size:30px;" href="shoppingcart.php">
                                BACK
                                            </a>
                            </button>
                        </center> 
                                
            </ul>
            
            </div>
        
        
                                
                                
                            <?php
                                     
                                    }
                            
                            
                            ?>
                            
                
                           
        </div>          
                            
           
            
         
                            
                            
                        
					
		

         
                
    
 
    
    </body>

</html>