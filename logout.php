 <?php
session_start();

// Unset email session variable
unset($_SESSION['email']);

// Redirect to index.php or any other page
header("Location: login.php");
exit();
?>
