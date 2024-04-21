<?php
include 'header.php';
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form fields
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $studentClass = $_POST['studentClass'];
    $section = $_POST['section'];
    $oldSchoolName = $_POST['oldSchoolName'];
    $dob = $_POST['dob'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];


    $default_photo_path = "/img/profile1.jpg";
    
    
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

    $sql = "INSERT INTO students (full_name, email, phone, password, address, student_class, section, old_school_name, dob, father_name, mother_name, photo_path)
            VALUES ('$fullName', '$email', '$phone', '$password', '$address', '$studentClass', '$section', '$oldSchoolName', '$dob', '$fatherName', '$motherName', '$photo_path')";

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert">
                New record created successfully
            </div>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>


<div class="container mt-5 border border-secondary rounded">
  <h2 class="mb-4 mt-4">Student Registration Form</h2>
  <form class="m-3" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="student-Class" class="form-label">Class</label>
          <select class="form-select" id="student-Class" name="studentClass">
            <option selected>Select Class</option>
            <option value="nursery">Nursery</option>
            <option value="lkg">LKG</option>
            <option value="ukg">UKG</option>
            <option value="class-1">Class 1</option>
            <option value="class-2">Class 2</option>
            <option value="class-3">Class 3</option>
            <option value="class-4">Class 4</option>
            <option value="class-5">Class 5</option>
            <option value="class-6">Class 6</option>
            <option value="class-7">Class 7</option>
            <option value="class-8">Class 8</option>
            <option value="class-9">Class 9</option>
            <option value="class-10">Class 10</option>
            <option value="class-11">Class 11</option>
            <option value="class-12">Class 12</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="section" class="form-label">Section</label>
          <select class="form-select" id="section" name="section">
            <option selected>Select Section</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="oldSchoolName" class="form-label">Old School Name</label>
          <input type="text" class="form-control" id="oldSchoolName" name="oldSchoolName" placeholder="Enter Old School Name">
        </div>
        <div class="mb-3">
          <label for="dob" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
          <label for="fatherName" class="form-label">Father's Name</label>
          <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Enter Father's Name">
        </div>
        <div class="mb-3">
          <label for="motherName" class="form-label">Mother's Name</label>
          <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Enter Mother's Name">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary p-2" style="width: 100%; ">Add Student</button>
  </form>
</div>


<?php include 'footer.php'; ?>
