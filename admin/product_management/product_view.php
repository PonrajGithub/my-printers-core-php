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

    <title>View | Products</title>

</head>
    <!--active inactive script-->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.status_checks', function() {
            var status = ($(this).hasClass("btn-primary")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var current_element = $(this);
                url = "product_action.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: $(current_element).attr('data'),
                        status: status
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
    </script>

    <?php include 'header.php' ?>

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


                    <?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="d-flex mb-2"><h3 class="text-center text-info">Product Details</h3>
                    <button class="btn-primary ml-auto"><a class="text-decoration-none text-white" href="product_add.php">Add product</a></button></div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Model Number</th>
                                <th>Design File</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><img src="<?= $row['photo'] ?>" width="25"></td>
                                    <td><?= $row['model'] ?></td>
                                    <td><?= $row['design_file'] ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <!--<td>
                                        <a href="details.php?details=<//?= $row['id']; ?>" class="badge badge-primary p-2">Details</a>
                                    </td>-->
                                    <td><i data="<?= $row['id'];?>" class="status_checks btn btn-sm <?= ($row['status'])? 'btn-primary' : 'btn-danger';?>"><?= ($row['status'])? 'Active' : 'Inactive';?></i></td>
                                    <td><a href="product_add.php?edit=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a> </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>


                </div>
                <!-- /.container-fluid -->

            <?php include 'footer.php' ?>