<?php
include 'cat_action.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add | Category</title>

</head>
            
            <?php include 'header.php'; ?>
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
                    <?php if($update==true){ ?>
                    <h3 class="text-center text-info">Edit Category</h3>
                <?php }else{ ?>
                <h3 class="text-center text-info">Add Category</h3>
            <?php } ?>
                    <form action="cat_action.php" method="POST">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label>Category Name: </label>
                            <input type="text" name="category_name" value="<?= $category_name; ?>" class="form-control" placeholder="Category Name" required>
                        </div>
                        <div class="form-group">
                            <label>Description: </label>
                            <input type="text" name="description" value="<?= $description; ?>" class="form-control" placeholder="Description" required>
                        </div>
                        
                        <input type="hidden" name="status" value="<?= $status; ?>">
                        
                        <br>
                        <center>
                            <div class="form-group col-sm-4">
                                <?php if ($update == true) { ?>
                                    <input type="submit" name="update" class="btn btn-success btn-block" value="Update Category">
                                <?php } else { ?>
                                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add Category">
                                <?php } ?>
                            </div>
                        </center>
                    </form>
                </div>

<?php include 'footer.php'; ?>
            