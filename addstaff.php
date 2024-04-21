<?php 
session_start();
if(isset($_SESSION['email'])) {
    echo "Email is set: " . $_SESSION['email'] . $_SESSION['school_name'] .'<a href="./logout.php">logout</a>';


include 'header.php'; 
include 'config.php'; 





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $post = $_POST['post'];
  $experience = $_POST['experience'];
  $dob = $_POST['dob'];
  $fatherName = $_POST['fatherName'];
  $motherName = $_POST['motherName'];

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



  $sql = "INSERT INTO staff (full_name, email, phone, password, address, post, experience, dob, father_name, mother_name,photo_path)
          VALUES ('$fullName', '$email', '$phone', '$password', '$address', '$post', '$experience', '$dob', '$fatherName', '$motherName','$photo_path')";

  if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-success" role="alert">
    New record created successfully
    </div>';;
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>


<div class="container mt-5 border border-secondary rounded">
  <h2 class="mb-4 mt-4">Staff Registration Form</h2>
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
          <label for="Post" class="form-label">Post</label>
          <input type="Text" class="form-control" id="post" name="post" placeholder="Enter Post">
        </div>
        
      </div>
      <div class="col-md-6">
      <div class="mb-3">
          <label for="experience" class="form-label">Experience (years)</label>
          <input type="number" class="form-control" id="experience" name="experience" placeholder="Enter years of experience">
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
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo">
        </div>
        
      </div>
    </div>
    <button type="submit" class="btn btn-primary p-2" style="width: 100%; ">Add Staff</button>
  </form>
</div>



<?php include 'footer.php'; }else{
  header("Location: login.php");
  exit();
  
}
  ?>
