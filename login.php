<?php

include 'index_action.php';


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

    <title>MyDesigns</title>
</head>

<body class="bg-danger">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-11 col-xl-10">
                <div class="card d-flex mx-auto my-5">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                            <div class="row mb-5 m-3"> <img src="images/logo.png" width="70vw" height="55vh" alt="">
                            </div> <img src="https://i.imgur.com/kdE7GKw.jpg" width="120vw" height="210vh"
                                class="mx-auto d-flex" alt="Teacher">
                            <div class="row justify-content-center">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                    <h1 class="wlcm">Welcome to your blackboard</h1> <span class="sp1"> <span
                                            class="px-3 bg-danger rounded-pill"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                            <form name="myform" onsubmit="" class="px-5 pb-5" method="POST">
                                <div class="d-flex"> <img src="images/logo.png" height="22px" width="22px" alt=""
                                        class="mr-3 mt-2">
                                    <h3 class="font-weight-bold">Log in</h3>
                                </div> <input type="text" name="username" placeholder="Username"> <input type="password"
                                    name="password" placeholder="Password"> <span class="ac" id="forgot"><a href="forgot_pass.php" class="text-decoration-none text-danger"> Forgot?</a></span>
                                <input type="submit" name="login" class="btn btn-primary">
                                <h5 class="ac" id="register"><a href="register.php">Register</a></h5>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>