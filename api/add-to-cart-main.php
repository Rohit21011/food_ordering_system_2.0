<?php 
include("connect.php");
$prod_id=$_POST['prod_id'];

$query="INSERT INTO add_to_cart SELECT product_id,product_name,product_image,product_price FROM product_details WHERE product_id='$prod_id'";
$sql=mysqli_query($connect,$query);

if($sql==true){
    echo 1; 
}
else{
    echo 0;
}
?>