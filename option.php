<?php include("config.php"); ?>
<?php
if(isset($_POST['c_id'])) {
	$sql = "SELECT * from `category` where `parent_id`=".mysqli_real_escape_string($conn, $_POST['c_id']);
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) {
		echo "<option value=''>------- Select --------</option>";
		while($row = mysqli_fetch_array($result)) {
			echo "<option value='".$row['id']."'>".$category = $row['category_name']."</option>";
		}
	}
}
if(isset($_POST['p_id'])) {
	$sql = "SELECT * from `product_price` where `category_id`=".mysqli_real_escape_string($conn, $_POST['p_id']);
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) {
		echo "<option value=''>------- Select --------</option>";
		while($row = mysqli_fetch_array($result)) {
			echo "<option value='".$row['id']."'>".$row['quantity']."</option>";
		}
	}
}
?>
