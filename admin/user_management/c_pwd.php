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

    <title>Update Password</title>
</head>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
                <?php include 'header.php'; ?>
                <div class="container-fluid">
                    <div class="modal-dialog">
                        <div class="modal-content col-md-10">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Update New Password</h4>
                            </div>
                            <form method="post" autocomplete="off" id="password_form">
                                <div class="modal-body with-padding">

                                

                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="disabledTextInput">User Name :</label>
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                value="<?= $username; ?>">
                                        </div>
                                    </fieldset>

                                    <div class="form-group">
                                        <label>Update Password :</label>
                                        <input type="hidden" name="password" value="<?= $password; ?>">
                                        <input type="password" name="password" class="form-control" id="myInput">
                                        <input type="checkbox" onclick="myFunction()" class="mt-2 mr-2 ml-2">Show Password
                                    </div>
                                </div>



                                <!-- end Add popup  -->
                                <div class="modal-footer">
                               
                                    <input type="submit" name="update_pwd" value="Submit" class="btn btn-info">
                                 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            <?php include 'footer.php' ?>