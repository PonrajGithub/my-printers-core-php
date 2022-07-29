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

    <title>Edit | User</title>
</head>

<?php include 'header.php' ?>

                <div class="container-fluid">
                    <div class="mt-5">

                        <?php if (isset($_SESSION['response'])) {     ?>
                            <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= $_SESSION['response']; ?>
                            </div>
                        <?php }
                        unset($_SESSION['response']);  ?>
                    </div>

                    <h3 class="text-center text-info">Update Users</h3>

                    <form action="action.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id; ?>">

                        <div class="row">
                            <label class="col mt-2"><span class="text-danger">*</span>First Name:
                                <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control" placeholder="First Name" required>
                            </label>

                            <label class="col mt-2"><span class="text-danger">*</span>Last Name:
                                <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control" placeholder="Last Name" required>
                        </div></label>

                        <div class="row">
                            <label class="col mt-2"><span class="text-danger">*</span>Email ID:
                                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email" required>
                            </label>

                            <label class="col mt-2"><span class="text-danger">*</span>Mobile Number:
                                <input type="tel" name="mobile" value="<?php echo $mobile; ?>" class="form-control" placeholder="Mobile Number" required>
                            </label>

                            <label class="col mt-2">Phone Number:
                                <input type="tel" name="phone" value="<?php echo $phone; ?>" class="form-control" placeholder="Phone Number">
                        </div></label>

                        <div class="row">
                            <label class="col-4 mt-2">Company Name:
                                <input type="text" name="company_name" value="<?php echo $company_name; ?>" class="form-control" placeholder="Company Name">
                            </label>

                            <label class="col mt-2"><span class="text-danger">*</span>Address:
                                <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="Address" required>
                        </div></label>

                        <div class="row">
                            <label class="col mt-2"><span class="text-danger">*</span>City:
                                <input type="text" name="city" value="<?php echo $city; ?>" class="form-control" placeholder="City" required>
                            </label>

                            <label class="col mt-2"><span class="text-danger">*</span>Pincode:
                                <input type="text" name="pincode" value="<?php echo $pincode; ?>" class="form-control" placeholder="Pincode" required>
                            </label>

                            <label class="col mt-2"><span class="text-danger">*</span>State:
                                <input type="text" name="state" value="<?php echo $state; ?>" class="form-control" placeholder="State" required>
                        </div></label>

                        <div class="row">
                            <label class="col mt-2">User Details:
                                <input type="text" name="details" value="<?php echo $details; ?>" class="form-control" placeholder="User Details">
                            </label>

                        </div>

                        <input type="hidden" name="status" value="<?php echo $status; ?>">


                        <br>

                        <center>
                            <div class="form-group col-sm-4">
                                <?php if ($update == true) { ?>
                                    <input type="submit" name="update" class="btn btn-success btn-block" value="Update User">
                                <?php } else { ?>
                                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add User">
                                <?php } ?>
                            </div>
                        </center>

                    </form>
                </div>
            <?php include 'footer.php'; ?>