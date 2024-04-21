<?php 
include 'config.php';
 include 'header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $class_teacher = $_POST['class_teacher'];
    $section = $_POST['section'];
    $age = $_POST['age'];
    $document_id = $_POST['document-id'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $old_school = $_POST['old-school'];
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

    // Insert data into MySQL database
    $sql = "INSERT INTO `teachers` (`full_name`, `email`, `phone`, `experience`, `class_teacher`, `section`, `age`, `document_id`, `password`, `address`, `old_school`, photo_path) 
            VALUES ('$full_name', '$email', '$phone', $experience, '$class_teacher', '$section', $age, '$document_id', '$password', '$address', '$old_school','$photo_path')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
        New record created successfully
        </div>';;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<div class="container border border-secondary mt-3 mb-3 rounded">
  <a href="http://localhost/crudwithphp/test/form.php">pu</a>
  <h1 class="mt-4 mb-4">Teacher Registration Form</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
        </div>
        <div class="mb-3">
          <label for="experience" class="form-label">Experience (years)</label>
          <input type="number" class="form-control" id="experience" name="experience" placeholder="Enter years of experience">
        </div>
        
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <label for="class-teacher" class="form-label">Class Teacher</label>
          <select class="form-select" id="class-teacher" name="class_teacher">
            <option selected>Select Class Teacher</option>
            <option value="other">other</option>
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
          <label for="age" class="form-label">Age</label>
          <input type="number" class="form-control" id="age" name="age" placeholder="Enter age">
        </div>
        <div class="mb-3">
          <label for="document-id" class="form-label">Document ID</label>
          <input type="text" class="form-control" id="document-id" name="document-id" placeholder="Enter document ID">
        </div>
      </div>
      <div class="col-md-4">
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
        <div class="mb-3">
          <label for="old-school" class="form-label">Old School Name</label>
          <input type="text" class="form-control" id="old-school" name="old-school" placeholder="Enter old school name">
        </div>
        
      </div>
    </div>
    <button type="submit" class="btn btn-primary mb-4 p-2" style="width: 100%;">Add Teacher</button>
  </form>
</div>

<?php include 'footer.php'; ?>
