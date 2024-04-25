<?php
    include 'db.php';
    if(isset($_GET['vendor_id'])){
        $vendor_id = $_GET['vendor_id'];
        $sql = "delete from `vendor_query` where vendor_id=$vendor_id";
        $result = mysqli_query($conn, $sql);
        if($result){
            // echo "deleted successfully";
            header('location:update-vendor.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>