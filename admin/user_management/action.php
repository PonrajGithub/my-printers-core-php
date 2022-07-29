<?php
session_start();
if (!$_SESSION['username']) {
    header('location:../index.php');
}
include 'config.php';

$update = false;
$id = "";
$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$mobile = "";
$company_name = "";
$address = "";
$city = "";
$pincode = "";
$state = "";
$details = "";
$status = "";
$username = "";

if (isset($_POST['add'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$company_name = $_POST['company_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$state = $_POST['state'];
	$details = $_POST['details'];
	
	


	$username = $_POST['username'];
	$password = $_POST['password'];
	if (isset($_POST["username"])) {

		$query = "SELECT * FROM user_login WHERE username='" . $username . "'";
		echo $query;
		$result = $conn->query($query);

		if ($result->num_rows > 0) {

			$_SESSION["response"] = "Username Already Exist";
			$_SESSION["res_type"] = "danger";
			header("location:user_add.php");
			exit();
		} else {
			$query = "INSERT INTO user_login (username, password) VALUES (?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('ss', $username, md5($password));
			$stmt->execute();
			$query = "SELECT * FROM user_login WHERE username='" . $username . "'";
			$result = $conn->query($query);
			/* fetch associative array */
			while ($row = mysqli_fetch_row($result)) {
				$user_id = $row[0];
				echo $user_id;
			}
		}
	}

	$query = "INSERT INTO user_details(user_id, first_name, last_name, email, phone, mobile, company_name, address,
		city, pincode, state, details) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('isssssssssss',$user_id,$first_name,$last_name,$email,$phone,$mobile,$company_name,$address,$city,$pincode,$state,$details
	);
	$stmt->execute();

	
	header('location:user_add.php');
	$_SESSION['response'] = "Success!";
	$_SESSION['res_type'] = "success";
}

extract($_POST);
$user_id = $conn->real_escape_string($id);
$status = $conn->real_escape_string($status);
$sql = $conn->query("UPDATE user_details SET status='$status' WHERE id='$id'");
//echo 1;

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];

	$query = "SELECT * FROM user_details WHERE id='".$id."' ";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

	$id = $row['id'];
	$user_id = $row['user_id'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	$phone = $row['phone'];
	$mobile = $row['mobile'];
	$company_name = $row['company_name'];
	$address = $row['address'];
	$city = $row['city'];
	$pincode = $row['pincode'];
	$state = $row['state'];
	$details = $row['details'];
	$status = $row['status'];

	$update = true;
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$company_name = $_POST['company_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$state = $_POST['state'];
	$details = $_POST['details'];
	$status = $_POST['status'];


	$query = "UPDATE user_details SET first_name=?, last_name=?, email=?, phone=?, mobile=?, company_name=?, address=?,
		city=?, pincode=?, state=?, details=?, status=? WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param(
		'ssssssssssssi',
		$first_name,
		$last_name,
		$email,
		$phone,
		$mobile,
		$company_name,
		$address,
		$city,
		$pincode,
		$state,
		$details,
		$status,
		$id
	);
	$stmt->execute();


	header('location:view_user.php');
	$_SESSION['response'] = "Update Successfully!";
	$_SESSION['res_type'] = "primary";
}

if (isset($_GET['details'])) {
	$id = $_GET['details'];

	$query = "SELECT * FROM user_details WHERE id='".$id."'";
	$result1 = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result1);

	$vid = $row['id'];
	$vuser_id = $row['user_id'];
	$vfirst_name = $row['first_name'];
	$vlast_name = $row['last_name'];
	$vemail = $row['email'];
	$vphone = $row['phone'];
	$vmobile = $row['mobile'];
	$vcompany_name = $row['company_name'];
	$vaddress = $row['address'];
	$vcity = $row['city'];
	$vpincode = $row['pincode'];
	$vstate = $row['state'];
	$vdetails = $row['details'];
	$vstatus = $row['status'];

}

if (isset($_GET['change_password'])) {
	$id = $_GET['change_password'];

	$query = "SELECT * FROM user_login WHERE id='".$id."'";
	$result2 = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result2);
	

	$id = $row['id'];
	$username = $row['username'];
	$password = $row['password'];

}

if (isset($_POST['update_pwd'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query= "UPDATE user_login SET password=?  WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('si',md5($password),$id);
	$stmt->execute();

	header('location:view_user.php');
	$_SESSION['response'] = "Password Update Successfully!";
	$_SESSION['res_type'] = "primary";

}