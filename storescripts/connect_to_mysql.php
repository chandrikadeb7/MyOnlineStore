<html>
   <head>
      <title>Connecting MySQLi Server</title>
   </head>
   
   <body>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '170399';
         $db_name = 'MyOnlineStore';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db_name);
   
         if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully';
         
      ?>
   </body>
</html>