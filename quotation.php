<?php
include 'index_action.php';
if (!$_SESSION['username']) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Quotation</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/admin.min.css" rel="stylesheet">
    <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
    border-radius: 25px;
}
   }
  </style>
  <script type="text/javascript" src="js/contact.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
    $("#cat").change(function() {
        var parent_id = $(this).val();
        if(parent_id != "") {
            $.ajax({
                url:"option.php",
                data:{c_id:parent_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#subcat").html(resp);
                }
            });
        } else {
            $("#subcat").html("<option value=''>------- Select --------</option>");
        }
    });
});
      $(document).ready(function() {
    $("#subcat").change(function() {
        var category_id = $(this).val();
        if(category_id != "") {
            $.ajax({
                url:"option.php",
                data:{p_id:category_id},
                type:'POST',
                success:function(response) {
                    var resp = $.trim(response);
                    $("#qty").html(resp);
                }
            });
        } else {
            $("#qty").html("<option value=''>------- Select --------</option>");
        }
    });
});
  </script>
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-sm navbar-light bg-white topbar mb-4 static-top shadow">
            <h1 class="text-light">
                <a href="index.html"><img src="assets/img/logo.png" width="70vw" height="55vh" alt=""></a>
                <a class="navbar-brand" href="#">PRODUCTS</a>

            </h1>

            <!-- Topbar Navbar -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-danger" data-toggle="dropdown">USER</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                     
                        <a class="dropdown-item" href="c_password.php?change_password=<?= $_SESSION["username"]; ?>">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                        
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-7">
            <div class="container" style="margin-top: 125px" align="center">
                <img src="images/quotation.jpg">
            </div>
        </div>
        <div class="col-lg-5 mt-5">
            <div class="container box">
   <h3 class="mt-3" align="center">Quotation</h3><br />

   <form id="contactForm" name="contact" role="form" action="model/saveContact.php" method="POST">
        
    <div class="form-group">
        <label>Select Category: </label>
        <select name="category" id="cat" class="form-control">
             <option value=''>------- Select --------</option>
             <?php
             $sql = "SELECT * from `category` where parent_id=0";
             $result = mysqli_query($conn, $sql);
                 while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$id = $row['id']."'>".$category = $row['category_name']."</option>";
                 }
            ?>
        </select>
     </div>
     <div class="form-group">
         <label>Select Subcategory: </label>
             <select name="subcategory" id="subcat" class="form-control"><option>------- Select --------</option></select>
     </div>
      <div class="form-group">
         <label>Select Quantity: </label>
             <select name="quantity" id="qty" class="form-control"><option>------- Select --------</option></select>
     </div>
     <center class="mb-3">
     <?php include 'model/index.php'; ?>
     </center>
   </form>
   </div>
  </div>
</div>
</div>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Cart Product</h3>
                        <p>
                            A108 Adam Street <br> New York, NY 535022<br> United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="mr-lg-auto text-center text-lg-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>Products</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>