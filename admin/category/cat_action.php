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

	if (isset($_POST['submit'])) {
		$category_name=$_POST['category_name'];
		$description=$_POST['description'];
		
	

		$query="INSERT INTO category(category_name,description)VALUES(?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('ss',$category_name,$description);
		$stmt->execute();

		header('location:add.php');
		$_SESSION['response']="Success!";
		$_SESSION['res_type']="success";
	}

	extract($_POST);
	$user_id = $conn->real_escape_string($id);
	$status = $conn->real_escape_string($status);
	$sql = $conn->query("UPDATE category SET status='$status' WHERE id='$id'");
	//echo 1;

	if (isset($_GET['edit'])) {
		$id=$_GET['edit'];

		$query="SELECT * FROM category WHERE id='".$id."' ";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		
		$id=$row['id'];
		$parent_id=$row['parent_id'];
		$category_name=$row['category_name'];
		$description=$row['description'];
		$status=$row['status'];


		$update=true;
	}

	if (isset($_POST['update'])) {
		$id=$_POST['id'];
		$category_name=$_POST['category_name'];
		$description=$_POST['description'];
		$status=$_POST['status'];
		

		
		$query="UPDATE category SET category_name=?,description=?,status=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('sssi',$category_name,$description,$status,$id);
		$stmt->execute();


		header('location:view.php');
		$_SESSION['response']="Update Successfully!";
		$_SESSION['res_type']="primary";
	}

	if (isset($_GET['add'])) {
		$id=$_GET['add'];

		$query="SELECT * FROM category WHERE id='".$id."' ";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		$id=$row['id'];
	}

	if(isset($_POST['add'])){
		$parent_id=$_POST['parent_id'];
		$category_name=$_POST['category_name'];
		$description=$_POST['description'];

		$query="INSERT INTO category(parent_id,category_name,description)VALUES(?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('iss',$parent_id,$category_name,$description);
		$stmt->execute();

		header('location:view.php');
		$_SESSION['response']="Subcategory Add Successfully!";
		$_SESSION['res_type']="primary";
	}

?>