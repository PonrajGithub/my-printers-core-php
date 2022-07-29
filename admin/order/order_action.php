<?php 
	session_start();
	if(!$_SESSION['username'])
    {
        header('location:../index.php');
	}
	include 'config.php';

	$update=false;
	
	$id="";
	$category="";
	$subcategory="";
	$quantity="";
	$price="";
	$number="";
	$email="";
	$status="";

	extract($_POST);
	$user_id = $conn->real_escape_string($id);
	$status = $conn->real_escape_string($status);
	$sql = $conn->query("UPDATE quotation SET status='$status' WHERE id='$id'");

	if (isset($_GET['edit'])) {
		$id=$_GET['edit'];

		$query="SELECT * FROM quotation WHERE id='".$id."' ";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		
		$id=$row['id'];
		$category=$row['category'];
		$subcategory=$row['subcategory'];
		$quantity=$row['quantity'];
		$price=$row['price'];
		$number=$row['number'];
		$email=$row['email'];
		$status=$row['status'];


		$update=true;
	}

	if (isset($_POST['update'])) {
		$id=$_POST['id'];
		$category_id=$_POST['category'];
		$subcategory_id=$_POST['subcategory'];
		$quantity_id=$_POST['quantity'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		$status=$_POST['status'];

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

		$query="UPDATE quotation SET category='".$category."',subcategory='".$subcategory."',quantity='".$quantity."',price='".$price."',number='".$number."',email='".$email."',status='".$status."',update_on= CURRENT_TIMESTAMP WHERE id='".$id."'";

		$res = mysqli_query($conn,$query);

		
		header('location:quotation_view.php');
		$_SESSION['response']="Update Successfully!";
		$_SESSION['res_type']="primary";
	}