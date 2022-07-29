<?php 
	session_start();
	include 'config.php';

	if (isset($_POST['add'])) {
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$mobile=$_POST['mobile'];
		$company_name=$_POST['company_name'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$pincode=$_POST['pincode'];
		$state=$_POST['state'];
		$details=$_POST['details'];
		$status=$_POST['status'];
		
		$username=$_POST['username'];
		$pass=$_POST['password'];
		if(isset($_POST["username"]))
       
        {
	
			$query="SELECT * FROM user_login WHERE username='".$username."'";
			echo $query;
			$result = $conn->query($query);

			if ($result->num_rows > 0) {
	  
				$_SESSION['response']="Username Already Exist";
				$_SESSION['res_type']="danger";
				header("location:register.php");
				exit();
			}
		else{
			$query="INSERT INTO user_login (username, password) VALUES (?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('ss', $username, md5($pass));
		$stmt->execute();
		$query="SELECT * FROM user_login WHERE username='".$username."'";
		$result = $conn->query($query);
/* fetch associative array */
while ($row = mysqli_fetch_row($result)) {
	$user_id = $row[0];
		echo $user_id;
}		
		}
            
        }


		$query="INSERT INTO user_details(user_id, first_name, last_name, email, phone, mobile, company_name, address,
		city, pincode, state, details, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		
		$stmt=$conn->prepare($query);
		
		$stmt->bind_param('issssssssssss',$user_id, $first_name,$last_name,$email,$phone,$mobile,$company_name,$address,
		$city,$pincode,$state,$details,$status);
		
		$stmt->execute();
		

		header('location:register.php');
		$_SESSION['response']="Success!";
		$_SESSION['res_type']="success";
	}

	?>
