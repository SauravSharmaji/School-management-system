<?php
include 'header.php';
include 'config.php';

if (isset($_GET['id_staff'])) {
    $id_staff = $_GET['id_staff'];

    $sql = "SELECT * FROM `staff` WHERE `id_staff` = $id_staff";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <div class="container mt-5 border border-secondary rounded">
            <h2 class="mb-4 mt-4">Staff update Form</h2>
            <form class="m-3" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <input type="hidden" name="id_staff" value="<?php echo $row['id_staff']; ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name" value="<?php echo $row['full_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo $row['phone']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo $row['address']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="post" class="form-label">Post</label>
                            <input type="text" class="form-control" id="post" name="post" placeholder="Enter Post" value="<?php echo $row['post']; ?>">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience (years)</label>
                            <input type="number" class="form-control" id="experience" name="experience" placeholder="Enter years of experience" value="<?php echo $row['experience']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fatherName" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Enter Father's Name" value="<?php echo $row['father_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="motherName" class="form-label">Mother's Name</label>
                            <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Enter Mother's Name" value="<?php echo $row['mother_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            <?php if (!empty($row['photo_path'])) : ?>
                                <img src="<?php echo $row['photo_path']; ?>" class="img-fluid" alt="Photo" id="profile-photo">
                                <button type="button" class="btn btn-danger" onclick="removePhoto()">Remove Photo</button>
                            <?php else : ?>
                                <p>No photo available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary p-2" style="width: 100%; ">Update Staff</button>

        </div>
        </form>
        </div>
<?php
    } else {
        echo 'Staff ID not found';
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_staff = $_POST['id_staff'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $address = $_POST['address'];
    $post = $_POST['post'];
    $experience = $_POST['experience'];
    $dob = $_POST['dob'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];

    $photo_path = ""; // Initialize photo path variable

    if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $file_path = "uploads/" . basename($_FILES["photo"]["name"]);
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path)) {
            $photo_path = $file_path;
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    $sql = "UPDATE `staff`
        SET 
            `full_name` = '$fullName',
            `email` = '$email',
            `phone` = '$phone',
            `address` = '$address',
            `post` = '$post',
            `experience` = '$experience',
            `dob` = '$dob',
            `father_name` = '$fatherName',
            `mother_name` = '$motherName'";
    if (!empty($photo_path)) {
        $sql .= ", `photo_path` = '$photo_path'";
    }
    $sql .= " WHERE `id_staff` = $id_staff";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
         Record updated successfully
        </div>';
        header("Location: viewstaff.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Error: ' . $sql . '<br>' . $conn->error . '
      </div>';
    }
} ?>
<script>
    function removePhoto() {
        document.getElementById('photo').value = '';
        document.getElementById('profile-photo').style.display = 'none';
    }
</script>

<?php
include 'footer.php';
?>
