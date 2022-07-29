<?php
include "register_action.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/da01f010f2.js" crossorigin="anonymous"></script>
    <link href="css/bootstrap-pincode-input.css" rel="stylesheet">

    <script type="text/javascript" src="js/bootstrap-pincode-input.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <!--<script src="js/script.js"></script>-->
    <title>MyDesigns</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-11 col-xl-10">
                <div class="card d-flex mx-auto my-5">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                            <div class="row mb-5 m-3"> <img src="images/logo.png" width="70vw" height="55vh" alt="">
                            </div> <img src="https://i.imgur.com/kdE7GKw.jpg" width="120vw" height="210vh" class="mx-auto d-flex" alt="Teacher">
                            <div class="row justify-content-center">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                    <h1 class="wlcm">Welcome to your blackboard</h1> <span class="sp1"> <span class="px-3 bg-danger rounded-pill"></span> <span class="ml-2 px-1 rounded-circle"></span> <span class="ml-2 px-1 rounded-circle"></span> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">


                            <?php if (isset($_SESSION['response'])) {     ?>
                                <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?= $_SESSION['response']; ?>
                                </div>
                            <?php }
                            unset($_SESSION['response']);  ?>

                        <form action="" method="POST" name="myForm" onsubmit="return(validate());" class="px-5 pb-5">
                            <div class="d-flex"> <img src="images/logo.png" height="22px" width="22px" alt="" class="mr-3 mt-2">
                                <h3 class="font-weight-bold">Register
                                </h3>
                            </div>
                            <div id="error_msg"></div>
                            <input type="text" name="username" placeholder="Create Username" id="username">
                            <input type="password" name="password" id="Password" placeholder="Create password">
                            <input type="password" id="ConfirmPassword" placeholder="Confirm Password" name="confpassword">
                            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div><input type="text" name="first_name" placeholder="Enter Your FirstName"> <input type="text" name="last_name" placeholder="Enter Your LastName">
                            <input type="text" name="email" placeholder="Enter Your Email">
                            <div id="error_msg"></div>
                            <input type="text" name="mobile" placeholder="Enter Your Mobile Number">
                            <input type="text" name="phone" placeholder="Telephone Number">
                            <input type="text" name="company_name" placeholder="Company Name">
                            <input type="text" name="address" placeholder="Enter Your Address">
                            <input type="text" name="city" placeholder="Enter Your City">
                            <input type="text" name="pincode" placeholder="Enter Your Pincode">
                            <input type="text" name="state" placeholder="Enter Your State">
                            <input type="text" name="details" placeholder="Enter Your Details">
                            <input type="submit" name="add" id="reg_btn" class="btn btn-primary" value="register">
                            <h5 class="ac" id="register"><a href="login.php">Login</a></h5>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
        // Form validation code will come here.
        function validate() {
            if (document.myForm.username.value == "") {
                alert("Please Enter your username!");
                document.myForm.username.focus();
                return false;
            }
            if (document.myForm.password.value == "") {
                alert("Please Enter your password!");
                document.myForm.password.focus();
                return false;
            }
            if (document.myForm.confpassword.value == "") {
                alert("Please Enter your confirm password!");
                document.myForm.confpassword.focus();
                return false;
            }
            if (document.myForm.first_name.value == "") {
                alert("Please Enter your first_name!");
                document.myForm.first_name.focus();
                return false;
            }
            if (document.myForm.last_name.value == "") {
                alert("Please Enter your last_name!");
                document.myForm.last_name.focus();
                return false;
            }
            if (document.myForm.email.value == "") {
                alert("Please Enter your Email!");
                document.myForm.email.focus();
                return false;
            }
            //if (document.myForm.phone.value == "") {
            //    alert("Please provide your Telephone Number!");
            //    document.myForm.phone.focus();
            //    return false;
            //}
            if (document.myForm.mobile.value == "") {
                alert("Please Enter your Mobile Number");
                document.myForm.mobile.focus();
                return false;
            }
            if (document.myForm.company_name.value == "-1") {
                alert("Please Enter your company name!");
                return false;
            }
            if (document.myForm.address.value == "") {
                alert("Please Enter your address here!");
                document.myForm.address.focus();
                return false;
            }
            if (document.myForm.pincode.value == "" || isNaN(document.myForm.pincode.value) ||
                document.myForm.pincode.value.length != 6) {

                alert("Please provide a pincode");
                document.myForm.pincode.focus();
                return false;
            }
            if (document.myForm.city.value == "-1") {
                alert("Please Enter your city!");
                return false;
            }
            if (document.myForm.state.value == "-1") {
                alert("Please Enter your state!");
                return false;
            }
            if (document.myForm.Zip.value == "" || isNaN(document.myForm.Zip.value) ||
                document.myForm.Zip.value.length != 5) {

                alert("Please provide a zip in the format #####.");
                document.myForm.Zip.focus();
                return false;
            }
            if (document.myForm.Country.value == "-1") {
                alert("Please Enter your country!");
                return false;
            }
            return (true);
        }
        $(document).ready(function() {
            $("#ConfirmPassword").on('keyup', function() {
                var username = $("username").val();
                var password = $("#Password").val();
                var confirmPassword = $("#ConfirmPassword").val();
                if (password != confirmPassword)
                    $("#CheckPasswordMatch").html("Password does not match !").css("color", "red");
                else
                    $("#CheckPasswordMatch").html("Password match !").css("color", "green");
                return (true);
            });
        });
    </script>
</body>

</html>