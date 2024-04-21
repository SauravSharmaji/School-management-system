<?php include 'header.php'; ?>
<?php include 'config.php'; ?>



<?php

$id = '000001';

$sql = "SELECT * FROM `schools` WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    // print_r($row);
} else {
    echo "No results found.";
} ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">School Information</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td><?php echo $row['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>School Name</th>
                                    <td><?php echo $row['school_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>School Address</th>
                                    <td><?php echo $row['school_address']; ?></td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td><?php echo $row['start_date']; ?></td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <td><?php echo $row['class']; ?></td>
                                </tr>
                                <tr>
                                    <th>Section</th>
                                    <td><?php echo $row['section']; ?></td>
                                </tr>
                                
                                <tr>
                                    <th>Owner Name</th>
                                    <td><?php echo $row['owner_name']; ?></td>
                                </tr>
                                
                                <tr>
                                    <th>Board Name</th>
                                    <td><?php echo $row['board_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>School Code</th>
                                    <td><?php echo $row['school_code']; ?></td>
                                </tr>
                                <tr>
                                    <th>Office Number</th>
                                    <td><?php echo $row['office_number']; ?></td>
                                </tr>
                                <tr>
                                    <th>Office Email</th>
                                    <td><?php echo $row['office_email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Principal Name</th>
                                    <td><?php echo $row['principal_name']; ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>


<?php
mysqli_close($conn);
include 'footer.php'; ?>