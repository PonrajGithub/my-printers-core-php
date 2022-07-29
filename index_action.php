<?php
include 'config.php';
session_start();
// if(isset($_SESSION["username"]))
// {
//    header("location:dashboard.php");
//}
if (isset($_POST["login"])) {
	if (empty($_POST["username"]) || empty($_POST["password"])) {
		echo '<script>alert("Username And Password is required")</script>';
	} else {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$query = "SELECT * FROM user_login WHERE username='$username' and password='$password'";
		$result = mysqli_query($conn, $query);


		if ($result > 0) {
			$_SESSION["username"] = $username;
			header("location:index.php");
		} else {
			echo '<script>alert("Wrong Username And Password")</script>';
		}
	}
}

if (isset($_GET['change_password'])) {
	$id = $_GET['change_password'];

	$query = "SELECT * FROM user_login WHERE id='" . $id . "'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);


	$id = $row[0];
	$username = $row[1];
	$password = $row[2];
}

if (isset($_POST['Submit'])) {
	$oldpass = md5($_POST['opwd']);
	$username = $_SESSION["username"];
	$newpassword = md5($_POST['npwd']);
	$sql = mysqli_query($conn, "SELECT password FROM user_login WHERE password='$oldpass' && username='$username'");
	$num = mysqli_fetch_array($sql);
	if ($num > 0) {
		$conn = mysqli_query($conn, "UPDATE user_login SET password=' $newpassword' WHERE username='$username'");
		$_SESSION['msg1'] = "Password Changed Successfully !!";
	} else {
		$_SESSION['msg1'] = "Old Password not match !!";
	}
}
