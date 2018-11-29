<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
	
    <!--Main Container Starts-->
    <div class="main_wrapper">
    	
        <!--Header Starts-->
    	<div class="header_wrapper">
            <a href="index.php"> <img src="images/estore.png" height="120px"  width="120px"   /></a>
           
        </div>
        <!--Header Ends-->
        
        <!--Navagation Bar starts-->
        <div id="navbar">
        	
            <ul id="menu">
        		<li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                
                <li><a href='customer/my_account.php'>My Account</a></li>
              
                <li><a href="customer_register.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href=" ">Contact Us</a></li>
        
        	</ul>
            
             <div id="form">
             	<form method="get" action="results.php" enctype="multipart/form-data">
                	
                    <input type="text" name="user_query" placeholder="Search a Product"/>
                    <input type="submit" name="search" value="Search" />
                    
                </form>
            </div>
            
        </div>
        <!--Navagation Bar Ends-->
       
       
        <div class="content_wrapper">
        	
            <div id="left_sidebar">
            
            	<div id="sidebar_title">Categories</div>
                
                <ul id="cats">
                	<?php getCats(); ?>
                    
                </ul>
                
                <div id="sidebar_title">Brands</div>
                 
                 <ul id="cats">
                 
                 <?php getBrands(); ?>
                
            
            	</ul>
            </div>
            
            
        	<div id="right_content">
           
            <?php cart(); ?> 
            
            	<div id="headline">
                	<div id="headline_content">
                    	<?php 
                        if(!isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome Guest!</b> <b style='color:orange'>Shopping Cart</b>";
							
							}
							else {
								echo "<b>Welcome:" . "<span style='color:skyblue'>" . $_SESSION['customer_email'] . "</span>" . "</b>" . "<b style='color:yellow'>Your Shopping Cart </b>";
								}
						?> 
                    	<span> - Total Items: <?php items(); ?> - Total Price: <?php total_price(); ?> - <a href="cart.php" style="color:purple;">Go to Cart</a>
                        
                        &nbsp; <?php 
                       
					   if(!isset($_SESSION['customer_email'])){
					    
						echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
					   }
					   else {
						   echo "<a href='logout.php' style='color:#F93;'>Logout</a>";
						   }
						
						?>
                        </span>
                    </div>
                </div>
     
            <div id="products_box">
           <?php 
		   
		   getPro(); 
		   getCatPro();
		   getBrandPro();
		   
		   ?>
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">
        
    <h3 style="color:#FFF; padding-top:30px; text-align:center;">&copy; 2007-2018 - NewDeals.com</h3>
       <a href="admin_area/login.php"><h4 style="color:#FFF; padding-top:30px; text-align:center;">For Admin</h4></a> 
        
        </div>
    
    
    
    </div>
    <!--Main Container End-->
    
</body>
</html>