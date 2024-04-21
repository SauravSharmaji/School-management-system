<?php
session_start();
if(isset($_SESSION['email'])) {
    echo "Email is set: " . $_SESSION['email'] . $_SESSION['school_name'] .'<a href="./logout.php">logout</a>';

} else {
    echo "Email is not set in the session";
    include 'config.php';
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM schools WHERE office_email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        // print_r($result);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
           
            $_SESSION['email'] = $row['office_email'];
            $_SESSION['school_name'] =  $row['school_name'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
        mysqli_close($conn);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" value="login" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}

?>
