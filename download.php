<?php
include 'config.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $stmt=$conn->prepare("SELECT * FROM `products` where id=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();

        $data = $stmt->fetch();

        $file = 'product_management/design_file/'.$data['design_file'];

        exit;
    }