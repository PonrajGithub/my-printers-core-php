<?php

include 'product_action.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add | Products</title>

</head>
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

                    <h3 class="text-center text-info">Product</h3>
                    <form action="product_action.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label>Select Category: </label>

                            <?php
                            $query = "SELECT * FROM `category` where parent_id=0";
                            $result1 = mysqli_query($conn, $query);
                            ?>
                            <div class="form-group">
                                <select name="category_name" class="form-control">
                                    <option value=''>------- Select --------</option>
                                    <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                                        <option value="<?php echo $row1['category_name']; ?>"><?php echo $row1['category_name']; ?></option>
                                    <?php endwhile; ?>

                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Product Name: </label>
                            <input type="text" name="product_name" value="<?= $product_name; ?>" class="form-control" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group">
                            <label>Description: </label>
                            <input type="textarea" name="description" value="<?= $description; ?>" class="form-control" placeholder="Enter Product Description" required>
                        </div>

                        <div class="form-group">
                            <label>Model: </label>
                            <input type="taxt" name="model" value="<?= $model; ?>" class="form-control" placeholder="Enter Product Model" required>
                        </div>

                        <div class="row form-group">
                            <label class="col mt-2">Select Product Image :  
                            <input type="hidden" name="oldimage" value="<?= $photo; ?>">
                            <input type="file" name="image"  >
                            <img src="<?= $photo; ?>" class="img-thumbnail">
                            </label>

                            <label class="col mt-2">Select design file :  
                            <input type="hidden" name="oldfile" value="<?= $design_file; ?>">
                            <input type="file" name="design_file">
                            </label>
                        </div>

                        <input type="hidden" name="status" value="<?= $status; ?>">

                        <center>
                            <div class="form-group col-sm-4">
                                <?php if ($update == true) { ?>
                                    <input type="submit" name="update" class="btn btn-success btn-block" value="Update Product">
                                <?php } else { ?>
                                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Product">
                                <?php } ?>
                            </div>
                        </center>
                    </form>




                </div>
                <!-- /.container-fluid -->

            <?php include 'footer.php' ?>