

<html>
    <head>
        <title>Register</title>
         <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="register.css">
	
          
     <link rel="stylesheet" href="css/templatemo-style.css">

        
        
    </head>
    <body style="background-color:black;">
        
        <!--Selection of customer type-->
        <table class="table">
            <tr>
                <td>
                    <center><button style="margin-top:20px;width:220px;height:220px;">
                        <a href="#popup1" style="text-decoration:none;font-size:40px;"><b>New Customer</b></a>
                    </button></center>
                    <center><button style="margin-top:20px;width:220px;height:220px;">
                        <a href="#popup2" style="text-decoration:none;font-size:40px;"><b>Existing Customer</b></a>
                    </button></center>
                </td>
            </tr>
        
        </table>
        <!--popup-->
        <div class="container">
            <div class="row">
                <div id="popup1" class="overlay">
                    <div class="popup1">
                        <center><h2></h2></center>
		                <a class="close" href="#">&times;</a>
		                      <div class="content">
                                <!-- multistep form -->
                                    <div class="col-lg-12">
                                            
                                            <form class="form-group" method="POST" action="newcustomer.php">
                                            <div class="row">
                                                               <!-- <div class="col-lg-6 col-md-6">
                                                              <label>ID: </label>
                                                              <input type="text" name="customer_id" class="form-control" placeholder="Enter ID" required >
                                                                </div> -->

                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Name: </label>
                                                              <input type="text" name="customer_name" class="form-control"  placeholder="Name">
                                                               </div>
                                             </div>
                                                             <br>
                                                              <label>Contact</label>
                                                              <input type="text" name="customer_contact" class="form-control" placeholder="Conatct">
                                                                <br>
                                                             <label>Address</label>
                                                              <input type="text" name="customer_address" class="form-control" placeholder="Enter address">
                                                                <br>
                                             <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Email</label>
                                                              <input type="text" name="customer_email" class="form-control" placeholder="Enter email" >
                                                                </div>

                                                                <div class="col-lg-6 col-md-6">
                                                              <label>Date of birth</label>
                                                              <input type="date" name="customer_dob" class="form-control" placeholder="Enter Date of birth">
                                                                </div>
                                                                   <div class="col-lg-6 col-md-6">
                                                              <label>Password</label>
                                                              <input type="text" name="customer_password" class="form-control" placeholder="Enter password" required>
                                                                </div>
                                                                
                                              </div>
                                                              <br>
                                                              <input type="submit" name="submit" value="Register Now" class="btn btn-warning btn-block btn-lg" style="box-shadow: 2px 2px 2px gray;"onclick="warn();">

                                                        </form>
                                                          
                                 </div>
                            </div>
	                   </div>
                    </div>
                 </div>
            </div>
        <!--existing customer-->
            <div class="container">
            <div class="row">
                <div id="popup2" class="overlay">
                    <div class="popup2">
                        <center><h2></h2></center>
		                <a class="close" href="#">&times;</a>
		                      <div class="content">
                                <!-- multistep form -->
                                    <div class="col-lg-12">
                                            
                                            <form class="form-group" method="POST" action="existingcustomer.php">
                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                              <label>ID: </label>
                                                              <input type="text" name="customer_id" class="form-control" placeholder="Enter ID" required>
                                                                </div>

                                                              
                                             </div>
                                                             
                                                             
                                             <div class="row">
                                                    
                                                                   <div class="col-lg-6 col-md-6">
                                                              <label>Password</label>
                                                              <input type="password" name="customer_password" class="form-control" placeholder="Enter password" required>
                                                                </div>
                                                                
                                              </div>
                                                              <br>
                                                              <input type="submit" name="submit" value="Log In" class="btn btn-warning btn-block btn-lg" style="box-shadow: 2px 2px 2px gray;"onclick="warn();">

                                                        </form>
                                                          
                                 </div>
                            </div>
	                   </div>
                    </div>
                 </div>
            </div>
        
        <!--end of popup-->
        <!--passing customer id in shpping cart-->
        
        
</body>


</html>