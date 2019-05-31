<?php
require "connect_to_mysql.php";  

$sqlCommand = "CREATE TABLE `products` (
		 		 id int(11) NOT NULL auto_increment,
				 product_name varchar(255) NOT NULL,
		 		 price varchar(16) NOT NULL,
				 details text NOT NULL,
				 category varchar(16) NOT NULL,
				 subcategory varchar(16) NOT NULL,
		 		 date_added date NOT NULL,
		 		 PRIMARY KEY (id),
		 		 UNIQUE KEY product_name (product_name)
		 		 ) ";
if (mysqli_query($conn,$sqlCommand)){ 
    echo "Your products table has been created successfully!"; 
} else { 
    echo "CRITICAL ERROR: products table has not been created.";
}
?>