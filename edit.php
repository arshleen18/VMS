<?php
    include 'db.php';
    $vendor_id=$_GET['vendor_id'];
    $sql="select * from `vendor_query` where vendor_id=$vendor_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $bidder_name = $row['bidder_name'];
    $company_name = $row['company_name'];
    $email = $row['email'];
    $address = $row['address'];
    $gst = $row['gst'];
    $tender_id = $row['tender_id'];
    $fees = $row['fees'];

    if(isset($_POST['submit'])){
        $bidder_name = $_POST['bidder_name'];
        $company_name = $_POST['company_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gst = $_POST['gst'];
        $tender_id = $_POST['tender_id'];
        $fees = $_POST['fees'];

        $sql="update `vendor_query` set vendor_id=$vendor_id,bidder_name='$bidder_name',company_name='$company_name',email='$email',address='$address',gst='$gst',fees=$fees where vendor_id=$vendor_id";

        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:update-vendor.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/vms-style.css">
</head>
<body>
    <div class="container my-5">
        <h3>EDIT VENDOR</h3>
        <form method="post">
            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
            <div class="form-group">
                    Bidder Name
                    <input type="text" class="form-control" name="bidder_name" value=<?php echo $bidder_name; ?>>
                </div>
                <div class="form-group">
                    Company Name
                    <input type="text" class="form-control" name="company_name" value=<?php echo $company_name; ?>>
                </div>
                <div class="form-group">
                    Company Email ID
                    <input type="email" class="form-control" name="email" value=<?php echo $email; ?>>
                </div>
                <div class="form-group">
                    Company Address
                    <input type="text" class="form-control" name="address" value=<?php echo $address; ?>>
                </div>
                <div class="form-group">
                    Company GST
                    <input type="text" class="form-control" name="gst" value=<?php echo $gst; ?>>
                </div>
                <div class="form-group">
                    Bidding against the Tender(Mention Tender ID)
                    <input type="text" class="form-control" name="tender_id" value=<?php echo $tender_id; ?>>
                </div>
                <div class="form-group">
                    Tender Fees
                    <input type="text" class="form-control" name="fees" value=<?php echo $fees; ?>>
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="submit" name="submit">
                </div>
        </form>
    </div>
</body>
</html>