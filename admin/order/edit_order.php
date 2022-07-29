<?php
	include 'order_action.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script type="text/javascript" src="js/contact.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
    $("#cat").change(function() {
        var parent_id = $(this).val();
        if(parent_id != "") {
            $.ajax({
                url:"option.php",
                data:{c_id:parent_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#subcat").html(resp);
                }
            });
        } else {
            $("#subcat").html("<option value=''>------- Select --------</option>");
        }
    });
});
      $(document).ready(function() {
    $("#subcat").change(function() {
        var category_id = $(this).val();
        if(category_id != "") {
            $.ajax({
                url:"option.php",
                data:{p_id:category_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#qty").html(resp);
                }
            });
        } else {
            $("#qty").html("<option value=''>------- Select --------</option>");
        }
    });
});
  </script>
<?php include 'header.php' ?>

<div class="container-fluid">
    <div class="col-md-12 mt-5">
     <?php    if(isset($_SESSION['response'])){     ?>
        <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $_SESSION['response']; ?>
        </div>
        <?php } unset($_SESSION['response']);  ?>
    </div>
    <div class="d-flex mb-2">
    <h3 class="text-center text-info">Edit Order</h3>
    </div>
    <form id="contactForm" name="contact" role="form" action="order_action.php" method="POST">
    	<input type="hidden" name="id" class="form-control" value="<?= $id ?>">
        
    <div class="form-group">
        <label>Select Category: </label>
        <select name="category" id="cat" class="form-control">
             <option value=''>------- Select --------</option>
             <?php
             $sql = "SELECT * from `category` where parent_id=0";
             $result = mysqli_query($conn, $sql);
                 while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$id = $row['id']."'>".$category = $row['category_name']."</option>";
                 }
            ?>
        </select>
     </div>
     
     <div class="form-group">
         <label>Select Subcategory: </label>
             <select name="subcategory" id="subcat" class="form-control"><option>------- Select --------</option></select>
     </div>
      <div class="form-group">
         <label>Select Quantity: </label>
             <select name="quantity" id="qty" class="form-control"><option>------- Select --------</option></select>
     </div>				
	 <div class="form-group">
	 	<label >Mobile Number: </label>
	 	<input type="text" name="number" class="form-control" value="<?= $number ?>">
	 </div>
	 <div class="form-group">
	 	<label >Email: </label>
	 	<input type="email" name="email" class="form-control" value="<?= $email ?>">
	 </div>	
	 <input type="hidden" name="status" class="form-control" value="<?= $status ?>">
	 <?php if ($update == true) { ?>
        <input type="submit" name="update" class="btn btn-success btn-block" value="Update">
        <?php } ?>		
   </form>

</div>


<?php include 'footer.php' ?>

