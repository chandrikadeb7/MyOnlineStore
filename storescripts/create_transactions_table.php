<?php

require "connect_to_mysql.php";  

$sqlCommand = "CREATE TABLE `transactions` (
		 		 id int(11) NOT NULL auto_increment,
				 product_id_array varchar(255) NOT NULL,
		 		 payer_email varchar(255) NOT NULL,
				 first_name varchar(255) NOT NULL,
				 last_name varchar(255) NOT NULL,
				 payment_date varchar(255) NOT NULL,
				 mc_gross varchar(255) NOT NULL,
				 payment_currency varchar(255) NOT NULL,
		 		 txn_id varchar(255) NOT NULL,
				 receiver_email varchar(255) NOT NULL,
				 payment_type varchar(255) NOT NULL,
				 payment_status varchar(255) NOT NULL,
				 txn_type varchar(255) NOT NULL,
				 payer_status varchar(255) NOT NULL,
				 address_street varchar(255) NOT NULL,
				 address_city varchar(255) NOT NULL,
				 address_state varchar(255) NOT NULL,
				 address_zip varchar(255) NOT NULL,
				 address_country varchar(255) NOT NULL,
				 address_status varchar(255) NOT NULL,
				 notify_version varchar(255) NOT NULL,
				 verify_sign varchar(255) NOT NULL,
				 payer_id varchar(255) NOT NULL,
				 mc_currency varchar(255) NOT NULL,
				 mc_fee varchar(255) NOT NULL,
		 		 PRIMARY KEY (id),
		 		 UNIQUE KEY txn_id (txn_id)
		 		 ) ";
if (mysqli_query($conn,$sqlCommand)){ 
    echo "Your transactions table has been created successfully!"; 
} else { 
    echo "CRITICAL ERROR: transactions table has not been created.";
}
?>