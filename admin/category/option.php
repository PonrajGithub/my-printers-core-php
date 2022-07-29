<?php include("config.php"); ?>
<?php
if(isset($_POST['c_id'])) {
	$sql = "SELECT * from `category` where `parent_id`=".mysqli_real_escape_string($conn, $_POST['c_id']);
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) {
		echo "<option value=''>------- Select --------</option>";
		while($row = mysqli_fetch_row($result)) {
			echo "<option value='".$id = $row[0]."'>".$category = $row[2]."</option>";
		}
	}
}
?>
