<?php
include 'config.php';

if (isset($_POST['submit'])) {
		
		$category_id=$_POST['category'];
		$subcategory_id=$_POST['subcategory'];
		$quantity_id=$_POST['quantity'];
		$number=$_POST['number'];
		$email=$_POST['email'];


		$sql = "SELECT category_name from `category` where id='".$category_id."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$category = $row['category_name'];

		$sql1 = "SELECT category_name from `category` where id='".$subcategory_id."'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_array($result1);
		$subcategory = $row1['category_name'];

		$sql2 = "SELECT quantity from `product_price` where id='".$quantity_id."'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($result2);
		$quantity = $row2['quantity'];

		$sql3 = "SELECT price from `product_price` where id='".$quantity_id."'";
		$result3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_array($result3);
		$price = $row3['price'];

		$query="INSERT INTO `quotation`(category,subcategory,quantity,price,number,email) VALUES(?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('ssssss',$category,$subcategory,$quantity,$price,$number,$email);
		$stmt->execute();

		header('location:../quotation.php');
}
?>