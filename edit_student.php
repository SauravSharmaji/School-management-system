<?php
include 'header.php';
include 'config.php';


if (isset($_GET['student_id'])) {
  $student_id = $_GET['student_id'];


  $sql = "SELECT `student_id`, `full_name`, `email`, `phone`, `address`, `student_class`, `section`, `old_school_name`, `dob`, `father_name`, `mother_name`, `photo_path`, `created_at` FROM `students` WHERE `student_id` = $student_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

?>



    <div class="container mt-5 border border-secondary rounded">
      <h2 class="mb-4 mt-4">Update Student Form</h2>
      <form class="m-3" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

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
              <label for="photo" class="form-label">Photo</label>
              <input type="file" class="form-control" id="photo" name="photo" value="<?php echo $row['photo_path']; ?>">
              <?php if (!empty($row['photo_path'])) : ?>
                <img src="<?php echo $row['photo_path']; ?>" class="img-fluid" alt="Photo" id="profile-photo">
                <button type="button" class="btn btn-danger" onclick="removePhoto()">Remove Photo</button>
              <?php else : ?>
                <p>No photo available</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="student-Class" class="form-label">Class</label>
              <select class="form-select" id="student-Class" name="studentClass">
                <?php
                // Array of class options
                $classOptions = array(
                  "nursery" => "Nursery",
                  "lkg" => "LKG",
                  "ukg" => "UKG",
                  "class-1" => "Class 1",
                  "class-2" => "Class 2",
                  "class-3" => "Class 3",
                  "class-4" => "Class 4",
                  "class-5" => "Class 5",
                  "class-6" => "Class 6",
                  "class-7" => "Class 7",
                  "class-8" => "Class 8",
                  "class-9" => "Class 9",
                  "class-10" => "Class 10",
                  "class-11" => "Class 11",
                  "class-12" => "Class 12"
                );

                // Loop through class options
                foreach ($classOptions as $value => $label) {
                  // Check if the value matches the fetched class
                  $selected = ($value == $row['student_class']) ? "selected" : "";
                  echo "<option value='$value' $selected>$label</option>";
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="section" class="form-label">Section</label>
              <select class="form-select" id="section" name="section">
                <?php
                // Array of section options
                $sectionOptions = array("A", "B", "C", "D");

                // Loop through section options
                foreach ($sectionOptions as $section) {
                  // Check if the value matches the fetched section
                  $selected = ($section == $row['section']) ? "selected" : "";
                  echo "<option value='$section' $selected>$section</option>";
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="oldSchoolName" class="form-label">Old School Name</label>
              <input type="text" class="form-control" id="oldSchoolName" name="oldSchoolName" placeholder="Enter Old School Name" value="<?php echo $row['old_school_name']; ?>">
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
          </div>
        </div>
        <button type="submit" class="btn btn-primary p-2" style="width: 100%; " value="update">Update Student</button>
      </form>
    </div>

<?php
  }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data

  $student_id = $_POST['student_id'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $studentClass = $_POST['studentClass'];
  $section = $_POST['section'];
  $oldSchoolName = $_POST['oldSchoolName'];
  $dob = $_POST['dob'];
  $fatherName = $_POST['fatherName'];
  $motherName = $_POST['motherName'];

  // File upload handling
  $default_photo_path = "img/profile.jpg";
  $photo_path = $default_photo_path;

  if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
    $file_path = "uploads/" . basename($_FILES["photo"]["name"]);
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path)) {
      $photo_path = $file_path;
    } else {
      echo "Error uploading file.";
      exit();
    }
  }

  // Prepare update SQL statement
  $sql = "UPDATE students SET 
                    full_name = '$fullName', 
                    email = '$email', 
                    phone = '$phone', 
                    address = '$address', 
                    student_class = '$studentClass', 
                    section = '$section', 
                    old_school_name = '$oldSchoolName', 
                    dob = '$dob', 
                    father_name = '$fatherName', 
                    mother_name = '$motherName', 
                    photo_path = '$photo_path'
                WHERE student_id = $student_id";

  // Execute the update query
  if (mysqli_query($conn, $sql)) {
    echo '<div class="alert alert-success" role="alert">
                    Record updated successfully
                  
                </div>';
    header("Location: viewstudent.php");
  } else {
    echo '<div class="alert alert-danger" role="alert">
                    Error updating record: ' . mysqli_error($conn) . '
                </div>';
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
<script>
  function removePhoto() {
    document.getElementById('photo').value = '';
    document.getElementById('profile-photo').style.display = 'none';
  }
</script>
<?php
include 'footer.php';
?>