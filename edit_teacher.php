<?php
include 'header.php';
include 'config.php';

if (isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];

    $sql = "SELECT * FROM `teachers` WHERE `teacher_id` = $teacher_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <div class="container border border-secondary mt-3 mb-3 rounded">
          
            <h1 class="mt-4 mb-4">Teacher update Form</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id']; ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name" value="<?php echo $row['full_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo $row['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience (years)</label>
                            <input type="number" class="form-control" id="experience" name="experience" placeholder="Enter years of experience" value="<?php echo $row['experience']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="class-teacher" class="form-label">Class Teacher</label>
                            <select class="form-select" id="class-teacher" name="class_teacher">
                                <?php
                                // Array of teacher options
                                $teacherOptions = array(
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

                                // Loop through teacher options
                                foreach ($teacherOptions as $value => $label) {
                                    // Check if the value matches the fetched teacher
                                    $selected = ($value == $row['class_teacher']) ? "selected" : "";
                                    echo "<option value='$value' $selected>$label</option>";
                                }
                                ?>
                            </select>
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
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" value="<?php echo $row['age']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="document-id" class="form-label">Document ID</label>
                            <input type="text" class="form-control" id="document-id" name="document-id" placeholder="Enter document ID" value="<?php echo $row['document_id']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
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

                        <div class="mb-3">
                            <label for="old-school" class="form-label">Old School Name</label>
                            <input type="text" class="form-control" id="old-school" name="old-school" placeholder="Enter old school name" value="<?php echo $row['old_school']; ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-4 p-2" style="width: 100%;">Update Teacher</button>
            </form>
        </div>
<?php
    } else {
        echo 'Teacher ID not found';
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teacher_id = $_POST['teacher_id'];
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $class_teacher = $_POST['class_teacher'];
    $section = $_POST['section'];
    $age = $_POST['age'];
    $document_id = $_POST['document-id'];

    $address = $_POST['address'];
    $old_school = $_POST['old-school'];
    $default_photo_path = "img/profile.jpg";


    if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {

        $file_path = "uploads/" . basename($_FILES["photo"]["name"]);


        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path)) {
            $photo_path = $file_path;
        } else {
            echo "Error uploading file.";
            exit();
        }
    } else {

        $photo_path = $default_photo_path;
    }

    $sql = "UPDATE teachers
    SET
        full_name = '$full_name',
        email = '$email',
        phone = '$phone',
        experience = $experience,
        class_teacher = '$class_teacher',
        section = '$section',
        age = $age,
        document_id = '$document_id',
       
        address = '$address',
        photo_path = '$photo_path',
        old_school = '$old_school'
    WHERE
        teacher_id = $teacher_id;
    ";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
         record update successfully
        </div>';
        header("Location: viewteacher.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Error: ' . $sql . '<br>' . $conn->error . '
      </div>';
    }
}?>
<script>
    function removePhoto() {
        document.getElementById('photo').value = '';
        document.getElementById('profile-photo').style.display = 'none';
    }
</script>

<?php
include 'footer.php';
?>