<?php include 'header.php'; include 'config.php';

if(isset($_GET['id_staff'])){
$id_staff = $_GET['id_staff'];
 ?>
<div class="container mt-5">
    <div class="row">
        <?php
        $sql = "SELECT * FROM `staff` WHERE `id_staff` = '$id_staff'";
        $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result)
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($row['photo_path'])): ?>
                        <img src="<?php echo $row['photo_path']; ?>" class="card-img-top" alt="Profile Photo">
                    <?php else: ?>
                        <img src="img/profile.jpg" class="card-img-top" alt="Default Profile Photo">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['full_name']; ?></h5>
                        <p class="card-text">Email: <?php echo $row['email']; ?></p>
                        <p class="card-text">Phone: <?php echo $row['phone']; ?></p>
                        <p class="card-text">Address: <?php echo $row['address']; ?></p>
                        <p class="card-text">Post: <?php echo $row['post']; ?></p>
                        <p class="card-text">Experience: <?php echo $row['experience']; ?></p>
                        <p class="card-text">Date of Birth: <?php echo $row['dob']; ?></p>
                        <p class="card-text">Father's Name: <?php echo $row['father_name']; ?></p>
                        <p class="card-text">Mother's Name: <?php echo $row['mother_name']; ?></p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        
    </div>
</div><?php }else if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id']

 ?>

<div class="container mt-5">
    <div class="row">
        <?php
        $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php if (!empty($row['photo_path'])): ?>
                    <img src="<?php echo $row['photo_path']; ?>" class="card-img-top" alt="Profile Photo">
                <?php else: ?>
                    <img src="img/profile.jpg" class="card-img-top" alt="Default Profile Photo">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['full_name']; ?></h5>
                    <p class="card-text">Email: <?php echo $row['email']; ?></p>
                    <p class="card-text">Phone: <?php echo $row['phone']; ?></p>
                    <p class="card-text">Address: <?php echo $row['address']; ?></p>
                    <p class="card-text">Class: <?php echo $row['student_class']; ?></p>
                    <p class="card-text">Section: <?php echo $row['section']; ?></p>
                    <p class="card-text">Old School Name: <?php echo $row['old_school_name']; ?></p>
                    <p class="card-text">Date of Birth: <?php echo $row['dob']; ?></p>
                    <p class="card-text">Father's Name: <?php echo $row['father_name']; ?></p>
                    <p class="card-text">Mother's Name: <?php echo $row['mother_name']; ?></p>
                    <a href="./edit_student.php?student_id=<?php echo $student_id; ?>" class="btn btn-primary">Edit Student</a>                </div>
            </div>
        </div>
    </div>
</div>


<?php }else if (isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];

    $sql = "SELECT * FROM `teachers` WHERE `teacher_id` = '$teacher_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($row['photo_path'])): ?>
                        <img src="<?php echo $row['photo_path']; ?>" class="card-img-top" alt="Profile Photo">
                    <?php else: ?>
                        <img src="img/profile.jpg" class="card-img-top" alt="Default Profile Photo">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['full_name']; ?></h5>
                        <p class="card-text">Email: <?php echo $row['email']; ?></p>
                        <p class="card-text">Phone: <?php echo $row['phone']; ?></p>
                        <p class="card-text">Experience: <?php echo $row['experience']; ?></p>
                        <p class="card-text">Class Teacher: <?php echo $row['class_teacher']; ?></p>
                        <p class="card-text">Section: <?php echo $row['section']; ?></p>
                        <p class="card-text">Age: <?php echo $row['age']; ?></p>
                        <p class="card-text">Document ID: <?php echo $row['document_id']; ?></p>
                        <p class="card-text">Address: <?php echo $row['address']; ?></p>
                        <p class="card-text">Old School: <?php echo $row['old_school']; ?></p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}else {
    header("Location: index.php");
    exit();
}
?>


<?php include 'footer.php'; ?>