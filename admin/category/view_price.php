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

    <title>View | Product Price</title>

</head>
<!--active inactive script-->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.status_checks', function() {
            var status = ($(this).hasClass("btn-primary")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var current_element = $(this);
                url = "price_action.php";
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
    <?php include 'header.php'; ?>

                <div class="container-fluid">


                    <div>

                        <?php if (isset($_SESSION['response'])) {     ?>
                        <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= $_SESSION['response']; ?>
                        </div>
                        <?php }
                        unset($_SESSION['response']);  ?>
                    </div>



                    <?php
                    $query = "SELECT * FROM product_price";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="d-flex mb-2">
                    <h3 class="text-center text-info">Product Price Details</h3>
                    <button class="btn-primary ml-auto"><a class="text-decoration-none text-white" href="product_price.php">Add Product Price</a></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category ID</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['category_id'] ?></td>
                                    <td><?= $row['quantity'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    
                                    <td><i data="<?= $row['id'];?>"
                                            class="status_checks btn btn-sm <?= ($row['status'])? 'btn-primary' : 'btn-danger'?>"><?= ($row['status'])? 'Active' : 'Inactive'?></i>
                                    </td>

                                    <td><a href="user_edit.php?edit=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-success">Edit</a> </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php include 'footer.php'; ?>