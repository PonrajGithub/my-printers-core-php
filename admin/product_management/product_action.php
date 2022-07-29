<?php 
	session_start();

	if (!$_SESSION['username']) {
		header('location:../index.php');
	}
	
	include '../user_management/config.php';

	$update=false;
	$id="";
	$category_name="";
	$product_name="";
	$description="";
	$model="";
	$photo="";
	$design_file="";
	$status="";

	if (isset($_POST['add'])) {
		$category_name=$_POST['category_name'];
		$product_name=$_POST['product_name'];
		$description=$_POST['description'];
		$model=$_POST['model'];

		$photo=$_FILES['image']['name'];
		$design_file=$_FILES['design_file']['name'];
		$photo_upload="uploads/".$photo;
		$design_upload="design_files/".$design_file;

		

		$temp = explode(".", $photo);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		$photo_name = $photo_upload . $newfilename;
		move_uploaded_file($_FILES["image"]["tmp_name"], $photo_name); 

		$temp = explode(".", $design_file);
		$newdesignname = round(microtime(true)) . '.' . end($temp);
		$design_name = $design_upload . $newdesignname;
		move_uploaded_file($_FILES["design_file"]["tmp_name"], $design_name); 

		
		$query="INSERT INTO products(category_name,product_name,description,model,photo,design_file)VALUES(?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('ssssss',$category_name,$product_name,$description,$model,$photo_name,$design_name);
		$stmt->execute();


		header('location:product_add.php');    
		$_SESSION['response']="Success!";
		$_SESSION['res_type']="success";
	}


	extract($_POST);
		$user_id=$conn->real_escape_string($id);
		$status=$conn->real_escape_string($status);
		$sql=$conn->query("UPDATE products SET status='$status' WHERE id='$id'");
		//echo 1;

	
	if (isset($_GET['edit'])) {
		$id=$_GET['edit'];

		$query="SELECT * FROM products WHERE id='".$id."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		$id=$row['id'];
		$category_name=$row['category_name'];
		$product_name=$row['product_name'];
		$description=$row['description'];
		$model=$row['model'];
		$photo=$row['photo'];
		$design_file=$row['design_file'];
		$status=$row['status'];

		$update=true;
	}

	if (isset($_POST['update'])) {
		$id=$_POST['id'];
		$category_name=$_POST['category_name'];
		$product_name=$_POST['product_name'];
		$description=$_POST['description'];
		$model=$_POST['model'];
		$status=$_POST['status'];
		$oldimage=$_POST['oldimage'];
		$oldfile=$_POST['oldfile'];

		if (isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")) {
			$newimage="uploads/".$_FILES['image']['name'];
			$temp = explode(".", $_FILES['image']['name']);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$newphoto_name = $newimage . $newfilename;
			move_uploaded_file($_FILES['image']['tmp_name'], $newphoto_name);
		}
		else {
			$newphoto_name=$oldimage;
		}
		if (isset($_FILES['design_file']['name'])&&($_FILES['design_file']['name']!="")) {
			$newfile="design_files/".$_FILES['design_file']['name'];
			$temp = explode(".", $_FILES['design_file']['name']);
			$newdesignname = round(microtime(true)) . '.' . end($temp);
			$newdesign_name = $newfile . $newdesignname;
			move_uploaded_file($_FILES['design_file']['tmp_name'], $newdesign_name);
		}
		else {
			$newdesign_name=$oldfile;
		}


		$query="UPDATE products SET category_name=?,product_name=?,description=?,model=?,photo=?,design_file=?,status=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('sssssssi',$category_name,$product_name,$description,$model,$newphoto_name,$newdesign_name,$status,$id);
		$stmt->execute();




		header('location:product_view.php');
		$_SESSION['response']="Update Successfully!";
		$_SESSION['res_type']="primary";
	}

	
?>