<?php
    include 'action.php';

?>


<!--<div class="container-fluid">
    <div class="modal-dialog">
        <div class="modal-content col-md-12">-->
<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
    <a href="view_user.php" class="close" >
        <span aria-hidden="true">&times;</span>
    </a>
</div>
<div class="modal-body text-dark">
    <b> First Name :</b> <?= $vfirst_name ?><br><br>
    <b> Last Name :</b> <?= $vlast_name ?><br><br>
    <b> E-Mail ID :</b> <?= $vemail ?><br><br>
    <b> Phone Number :</b> <?= $vphone ?><br><br>
    <b> Mobile Number :</b> <?= $vmobile ?><br><br>
    <b> Company Name :</b> <?= $vcompany_name ?><br><br>
    <b> Address :</b> <?= $vaddress ?><br><br>
    <b> City :</b> <?= $vcity ?><br><br>
    <b> Pincode :</b> <?= $vpincode ?><br><br>
    <b> State :</b> <?= $vstate ?><br><br>
    <b> Details :</b> <?= $vdetails ?><br><br>
</div>
<div class="modal-footer">
    <a href="view_user.php" class="btn btn-dark">Close</a>
</div>
<!--   </div>
    </div>
</div> -->



</body>

</html>