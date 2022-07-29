<?php
include 'action.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View | User</title>
</head>
<!--active inactive script-->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    $(document).on('click', '.status_checks', function() {
        var status = ($(this).hasClass("btn-primary")) ? '0' : '1';
        var msg = (status == '0') ? 'Deactivate' : 'Activate';
        if (confirm("Are you sure to " + msg)) {
            var current_element = $(this);
            url = "action.php";
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

    <script type="text/javascript" src="js/contact.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
                    $query = "SELECT * FROM user_details";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="d-flex mb-2">
                    <h3 class="text-center text-info">User Details</h3>
                    <button class="btn-primary ml-auto"><a class="text-decoration-none text-white" href="user_add.php">Add User</a></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First_Name</th>
                                    <th>Last_Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Company_Name</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Password_Update</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['mobile'] ?></td>
                                    <td><?= $row['company_name'] ?></td>


                                    <td><i data="<?= $row['id'];?>"
                                            class="status_checks btn btn-sm <?= ($row['status'])? 'btn-primary' : 'btn-danger'?>"><?= ($row['status'])? 'Active' : 'Inactive'?></i>
                                    </td>

                                    <td>
                                        <div id="contact"><a href="details.php?details=<?= $row['id']; ?>"
                                                class="btn btn-sm btn-secondary" data-toggle="modal"
                                                data-target="#staticBackdrop">Details</a></div>
                                    </td>

                                    <td><a href="user_edit.php?edit=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-success">Edit</a> </td>

                                    <td><a href="c_pwd.php?change_password=<?= $row['user_id']; ?>"
                                            class="btn btn-sm btn-info" >Update Password</a> </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Details Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <?php include 'details.php' ?>
                        </div>
                    </div>
                </div>
            <?php include 'footer.php' ?>