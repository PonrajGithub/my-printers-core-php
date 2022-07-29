<?php
include 'price_action.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add | Product Price</title>

</head>
    
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
  </script>
  <?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="col-md-12 mt-5">

                        <?php if (isset($_SESSION['response'])) {     ?>
                            <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= $_SESSION['response']; ?>
                            </div>
                        <?php }
                        unset($_SESSION['response']);  ?>
                    </div>

                    <h3 class="text-center text-info">Product Price</h3>
                    <form action="price_action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label>Select Category: </label>
                            <select name="category_id" id="cat" class="form-control">
                            <option value=''>------- Select --------</option>
                            <?php
                            $sql = "SELECT * from `category` where parent_id=0";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_row($result)) {
                            echo "<option value='".$id = $row[0]."'>".$category = $row[2]."</option>";
                            }
                            ?>
                            </select>
                            </div>
                        <div class="form-group">
                            <label>Select Subcategory: </label>
                            <div class="form-group">
                                <select name="subcategory" id="subcat" class="form-control"><option>------- Select --------</option></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Quantity: </label>
                            <input type="number" name="quantity" class="form-control" placeholder="Enter Product Quantitiy" required>
                        </div>

                        <div class="form-group">
                            <label>Product price: </label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Product Price" required>
                        </div>

                        <input type="hidden" name="status" value="<?= $status; ?>">

                        <center>
                            <div class="form-group col-sm-4">
                                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add">
                            </div>
                        </center>
                    </form>
                </div>
                <!-- container-fluid -->

           <?php include 'footer.php' ?>