<?php include 'header.php';
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $schoolName = $_POST['schoolName'];
    $schoolAddress = $_POST['schoolAddress'];
    $startDate = $_POST['startDate'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $logo = $_FILES['logo']['name'];
    $ownerName = $_POST['ownerName'];
    $validDocument = $_FILES['validDocument']['name'];
    $boardName = $_POST['boardName'];
    $schoolCode = $_POST['schoolCode'];
    $officeNumber = $_POST['officeNumber'];
    $officeEmail = $_POST['officeEmail'];
    $principalName = $_POST['principalName'];
    $password = $_POST['password'];

    // Set default photo path if school photo is not provided
    $default_photo_path = "img/profile.jpg";

    // Upload files
    $target_dir = "uploads/";
    $logo_target_file = $target_dir . basename($_FILES["logo"]["name"]);
    $validDocument_target_file = $target_dir . basename($_FILES["validDocument"]["name"]);

    if (!empty($logo) && move_uploaded_file($_FILES["logo"]["tmp_name"], $logo_target_file) && !empty($validDocument) && move_uploaded_file($_FILES["validDocument"]["tmp_name"], $validDocument_target_file)) {
        // Both photos provided
        $logo_path = $logo_target_file;
        $valid_document_path = $validDocument_target_file;
    } elseif (!empty($logo) && move_uploaded_file($_FILES["logo"]["tmp_name"], $logo_target_file)) {
        // Only school logo provided
        $logo_path = $logo_target_file;
        $valid_document_path = "";
    } elseif (!empty($validDocument) && move_uploaded_file($_FILES["validDocument"]["tmp_name"], $validDocument_target_file)) {
        // Only valid document provided
        $logo_path = "";
        $valid_document_path = $validDocument_target_file;
    } else {
        // No photo provided, use default photo
        $logo_path = $default_photo_path;
        $valid_document_path = "";
    }

    // Insert data into database
    $sql = "INSERT INTO schools (school_name, school_address, start_date, class, section, logo, owner_name, valid_document, board_name, school_code, office_number, office_email, principal_name, password)
    VALUES ('$schoolName', '$schoolAddress', '$startDate', '$class', '$section', '$logo_path', '$ownerName', '$valid_document_path', '$boardName', '$schoolCode', '$officeNumber', '$officeEmail', '$principalName', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
        School record inserted successfully
    </div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



?>
<div class="container mt-5 border border-secondary rounded">


    <h1 class="text-center mb-3">School Registration</h1>
    <form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="schoolName">School Name</label>
                <input type="text" class="form-control" id="schoolName" name="schoolName" placeholder="Enter school name">
            </div>
            <div class="form-group mb-3">
                <label for="schoolAddress">School Address</label>
                <input type="text" class="form-control" id="schoolAddress" name="schoolAddress" placeholder="Enter school address">
            </div>
            <div class="form-group mb-3">
                <label for="startDate">School Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="form-group mb-3">
                <label for="class">Class</label>
                <input type="text" class="form-control" id="class" name="class" placeholder="Enter class">
            </div>
            <div class="form-group mb-3">
                <label for="section">Section</label>
                <input type="text" class="form-control" id="section" name="section" placeholder="Enter section">
            </div>
            <div class="form-group mb-3">
                <label for="logo">School Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo">
            </div>
            <div class="form-group mb-3">
                <label for="ownerName">Owner Name</label>
                <input type="text" class="form-control" id="ownerName" name="ownerName" placeholder="Enter owner name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="validDocument">Valid Document</label>
                <input type="file" class="form-control-file" id="validDocument" name="validDocument">
            </div>
            <div class="form-group mb-3">
                <label for="boardName">Board Name</label>
                <input type="text" class="form-control" id="boardName" name="boardName" placeholder="Enter board name">
            </div>
            <div class="form-group mb-3">
                <label for="schoolCode">School Code</label>
                <input type="text" class="form-control" id="schoolCode" name="schoolCode" placeholder="Enter school code">
            </div>
            <div class="form-group mb-3">
                <label for="officeNumber">Office Number</label>
                <input type="tel" class="form-control" id="officeNumber" name="officeNumber" placeholder="Enter office number">
            </div>
            <div class="form-group mb-3">
                <label for="officeEmail">Office Email</label>
                <input type="email" class="form-control" id="officeEmail" name="officeEmail" placeholder="Enter office email">
            </div>
            <div class="form-group mb-3">
                <label for="principalName">Principal Name</label>
                <input type="text" class="form-control" id="principalName" name="principalName" placeholder="Enter principal name">
            </div>
            <div class="form-group mb-3">
                <label for="emergencyNumber">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3" style="width: 100%;">Add School</button>
</form>

</div>




<?php include 'footer.php'; ?>