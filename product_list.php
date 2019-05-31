<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
include "storescripts/connect_to_mysql.php";
$dynamicList1 = "";
$sql = mysqli_query($conn, "SELECT * FROM `products` ORDER BY date_added DESC LIMIT 10");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList1 .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            ₹' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysqli_close($conn);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<style>
.button {
  background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.scroll-left {
height: 50px; 
overflow: hidden;
position: relative;
}
.scroll-left p {
position: absolute;
width: 100%;
height: 100%;
margin: 0;
line-height: 50px;
text-align: center;
/* Starting position */
-moz-transform:translateX(100%);
-webkit-transform:translateX(100%); 
transform:translateX(100%);
/* Apply animation to this element */ 
-moz-animation: scroll-left 7s linear infinite;
-webkit-animation: scroll-left 7s linear infinite;
animation: scroll-left 7s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes scroll-left {
0% { -moz-transform: translateX(100%); }
100% { -moz-transform: translateX(-100%); }
}
@-webkit-keyframes scroll-left {
0% { -webkit-transform: translateX(100%); }
100% { -webkit-transform: translateX(-100%); }
}
@keyframes scroll-left {
0% { 
-moz-transform: translateX(100%); /* Browser bug fix */
-webkit-transform: translateX(100%); /* Browser bug fix */
transform: translateX(100%); 
}
100% { 
-moz-transform: translateX(-100%); /* Browser bug fix */
-webkit-transform: translateX(-100%); /* Browser bug fix */
transform: translateX(-100%); 
}
}
</style>
<div align="center" id="mainWrapper">
<div valign="right" style="height: 300px; width: 1300px; color: #ffffff; 
	background-image: url(style/bg1.jpg);></div>
  <?php include_once("template_header.php");?>
	<div style="height: 1150px; width: 1300px; color: #ffffff; 
	background-image: url(style/bg.jpg);>
  <div id="pageContent"><br/>
	<form action= "http://localhost/Webucator/ClassFiles/MyOnlineStore2/product.php?id=6" method="post">
<input type="text" name="search" size="75" value="Lakme Red Lipstick">
<input type="submit" class="button" value="Search">
</form>
  <table width="50%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="45%" valign="center"><h1>Our Products</h1>
	<div class="scroll-left">
<h3><p>SALE SALE SALE!!!</p></h3>
</div>
      <p><?php echo $dynamicList1; ?><br />
        </p>
      <p><br />
      </p></td>
  </tr>
</table>
</div>
  <?php include_once("template_footer.php");?>
</div>
</div>
</body>
</html>