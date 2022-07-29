<?php
    include 'order_action.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View | Orders</title>

</head>

 <!--active inactive script-->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.status_checks', function() {
            var status = ($(this).hasClass("btn-primary")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var current_element = $(this);
                url = "order_action.php";
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
                    <div class="col-md-12 mt-5">

                     <?php    if(isset($_SESSION['response'])){     ?>
                        <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= $_SESSION['response']; ?>
                        </div>
                        <?php } unset($_SESSION['response']);  ?>
                    </div>

                    <div class="d-flex mb-2">
                    <h3 class="text-center text-info">Order Details</h3>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Mobile Number</th>
                                <th>Email-ID</th>
                                <th>Status</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $sql = "SELECT * from quotation";
                                $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result)){ ?>
                            <tr>

                                <td><?= $row['id'] ?></td>
                                <td><?= $row['category'] ?></td>
                                <td><?= $row['subcategory'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['number'] ?></td>
                                <td><?= $row['email'] ?></td>
                                
                                <!--<a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |-->
                                <td><i data="<?= $row['id'];?>" class="status_checks btn btn-sm <?= ($row['status'])? 'btn-primary' : 'btn-danger'?>"><?= ($row['status'])? 'Active' : 'Inactive'?></i></td>
                                <td><a href="edit_order.php?edit=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                 <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

<?php include 'footer.php'; ?>