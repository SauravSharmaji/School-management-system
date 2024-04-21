<?php include 'header.php'; ?>
<?php include 'config.php'; 

// SQL query to count teachers
$sql_teachers = "SELECT COUNT(*) as total_teachers FROM teachers";
$result_teachers = $conn->query($sql_teachers);
$row_teachers = $result_teachers->fetch_assoc();

// SQL query to count students
$sql_students = "SELECT COUNT(*) as total_students FROM students";
$result_students = $conn->query($sql_students);
$row_students = $result_students->fetch_assoc();

// SQL query to count staff
$sql_staff = "SELECT COUNT(*) as total_staff FROM staff";
$result_staff = $conn->query($sql_staff);
$row_staff = $result_staff->fetch_assoc();

$total_Teacher = $row_teachers["total_teachers"];
$total_student = $row_students["total_students"];
$total_staff = $row_staff["total_staff"];
$total = $total_Teacher + $total_student +$total_staff;

?>

<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">School Status</h5>
      <div class="status-info">
        <p class="alert alert-success">Total teachers: <?php echo $row_teachers["total_teachers"]; ?></p>
        <p class="alert alert-success">Total students: <?php echo $row_students["total_students"]; ?></p>
        <p class="alert alert-success">Total staff:  <?php echo $row_staff["total_staff"]; ?></p>
        <p class="alert alert-primary"> Total : <?php echo $total; ?></p>
      </div>
    </div>
  </div>
</div>



<?php 
// Close connection
$conn->close();
include 'footer.php'; ?>
