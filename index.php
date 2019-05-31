<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
include "storescripts/connect_to_mysql.php"; 
$dynamicList = "";
$sql = mysqli_query($conn, "SELECT * FROM `products` ORDER BY date_added DESC LIMIT 4");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
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
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
<div valign="right" style="height: 300px; width: 1300px; color: #ffffff; 
	background-image: url(style/bg1.jpg);></div>
  <?php include_once("template_header.php");?>
	<div style="height: 600px; width: 1300px; color: #ffffff; 
	background-image: url(style/bg.jpg);>
	background-image: url(style/bg.jpg);
	<div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="40%" valign="top"><h2>CELEBRATE THIS SUMMER WITH OUR LATEST FASHION!!</h2>
      <p><h3>This is an eCommerce website with a wide range of fashionable clothing for men, women and kids at fair and reasonable prices.</h3>
<p><u><b>Like us on Facebook by clicking on the link</b></u>
        <a href="https://www.facebook.com/">Shopnix</a> </p>
      <p><h2><i>The colour of this season is <font color="red">RED</font>. View our clothing range soon... </i></h2>
        <br />
        <h1>Fill your cart NOW!!</h1></p></td>
    <td width="35%" valign="top"><h2>Latest Designer Fashions</h2>
      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br/>
      </p></td>
    <td width="25%" valign="middle"><h1>Latest Deals..!!</h1><br/>
      <p><h3><i>Upto 30% off on Women Topwear<br/><br/>
	Upto 40% off on Men Accessories<br/><br/>
	Upto 45% off on Kids Bottomwear</i></h3><br/><br/>
	<h2>An exciting place for the whole family to shop.</h2><br/>
	</td>
  </tr>
</table>
</div>
  </div>
</div>
	<div align="center" id="mainWrapper">
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>