<?php 
	session_start();
	if(!$_SESSION['username'])
    {
        header('location:../index.php');
	}
	
	include 'config.php';

	$update=false;
	$id="";
	$category_name="";
	$description="";
	$status="";

	if (isset($_POST['add'])) {
		$category=$_POST['category_id'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];

		$query="INSERT INTO product_price(category_id,quantity,price)VALUES(?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('iss',$category,$quantity,$price);
		$stmt->execute();

		header('location:view_price.php');
		$_SESSION['response']="Added Succesfully!";
		$_SESSION['res_type']="success";
	}

	extract($_POST);
	$user_id = $conn->real_escape_string($id);
	$status = $conn->real_escape_string($status);
	$sql = $conn->query("UPDATE product_price SET status='$status' WHERE id='$id'");
	//echo 1;