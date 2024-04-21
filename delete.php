<?php
include 'config.php';

if(isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['student_id']);
    
    $sql = "DELETE FROM students WHERE student_id = '$student_id'";

    if(mysqli_query($conn, $sql)) {
        header("Location: viewstudent.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else if(isset($_GET['teacher_id'])) {
    $teacher_id = mysqli_real_escape_string($conn, $_GET['teacher_id']);
    
    $sql = "DELETE FROM `teachers` WHERE teacher_id = '$teacher_id'";

    if(mysqli_query($conn, $sql)) {
        header("Location: viewteacher.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else if(isset($_GET['id_staff'])) {
    $id_staff = mysqli_real_escape_string($conn, $_GET['id_staff']);
    
    $sql = "DELETE FROM `staff` WHERE id_staff = '$id_staff'";

    if(mysqli_query($conn, $sql)) {
        header("Location: viewstaff.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
    exit();
}
?>


