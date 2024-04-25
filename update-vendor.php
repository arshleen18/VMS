<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vendor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/update-vendor-style.css">
</head>
<body>
    <div class="container my-5">	
        <header>
            <div class="nav">
                <a href="logout.php">Log out</a>
            </div>
        </header>		
        <h3>Update Vendor</h3>
        <a href="create.php" class="btn btn-primary" role="button">Add vendor</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Vendor ID</th>
                    <th>Bidder Name</th>
                    <th>Company Name</th>
                    <th>Company Email ID</th>
                    <th>Company Address</th>
                    <th>Company GST</th>
                    <th>Tender ID</th>
                    <th>Tender Fees</th>
                    <th>Added On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("db.php");
                    //fetch all the records
                    $query = "SELECT * FROM vendor_query";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    //put in table and display
                    while($row = mysqli_fetch_assoc($data)){
                        echo "<tr>
                            <td>" . $row['vendor_id'] . "</td>
                            <td>" . $row['bidder_name'] . "</td>
                            <td>" . $row['company_name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['gst'] . "</td>
                            <td>" . $row['tender_id'] . "</td>
                            <td>" . $row['fees'] . "</td>
                            <td>" . $row['added_on'] . "</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?vendor_id=$row[vendor_id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?vendor_id=$row[vendor_id]'>Delete</a>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="dashboard.html">Back</a>
    </div>
</body>
</html>