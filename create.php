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
    <?php
        include("db.php");
        $bidder_name = "";
        $company_name = "";
        $email = "";
        $address = "";
        $gst = "";
        $tender_id = "";
        $fees = "";

	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bidder_name = $_POST['bidder_name'];
            $company_name = $_POST['company_name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $gst = $_POST['gst'];
            $tender_id = $_POST['tender_id'];
            $fees = $_POST['fees'];

            do {
                $query = "INSERT INTO vendor_query (bidder_name, company_name, email, address, gst, tender_id, fees) VALUES ('$bidder_name', '$company_name', '$email', '$address', '$gst', '$tender_id', '$fees')";
                mysqli_query($conn, $query);
                
                $bidder_name = "";
                $company_name = "";
                $email = "";
                $address = "";
                $gst = "";
                $tender_id = "";
                $fees = "";

                echo "<div class='alert alert-success' style='width: 800px;'>Vendor records registered successfully</div>";

                mysqli_close($conn);

            } while (false);

            
        }
    ?>
    <!-- add vendor box -->
    <div class="container" style="max-width: 800px;">
        <h3>ADD VENDOR</h3>
        <form action="create.php" method="post">
        <div class="form-group">
                    Bidder Name
                    <input type="text" class="form-control" name="bidder_name" value="<?php echo $bidder_name; ?>">
                </div>
                <div class="form-group">
                    Company Name
                    <input type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>">
                </div>
                <div class="form-group">
                    Company Email ID
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    Company Address
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
                <div class="form-group">
                    Company GST
                    <input type="text" class="form-control" name="gst" value="<?php echo $gst; ?>">
                </div>
                <div class="form-group">
                    Bidding against the Tender(Mention Tender ID)
                    <input type="text" class="form-control" name="tender_id" value="<?php echo $tender_id; ?>">
                </div>
                <div class="form-group">
                    Tender Fees
                    <input type="text" class="form-control" name="fees" value="<?php echo $fees; ?>">
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="submit" name="submit">
                </div>
            <a href="update-vendor.php">Back</a>
        </form>
    </div>
</body>
</html>