<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="container">
  <h1 class="mt-5 mb-4">Student Data</h1>
  <table class="table border rounded-1">
    <thead class="bg-dark text-light">
      <tr>
        <th scope="col">Profile Photo</th>
        <th scope="col">Student Name</th>
        <th scope="col">Class</th>
        
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Retrieve data from the database
      $sql = "SELECT student_id, full_name, email, phone, student_class, section, photo_path FROM students";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            // Display profile photo or default photo
            if (!empty($row["photo_path"])) {
                echo "<img src='" . $row["photo_path"] . "' alt='Profile Photo' class='img-fluid rounded-circle' style='width: 50px; height: 50px;'>";
                
            } else {
                echo "<img src='img/profile.jpg' alt='Default Profile Photo' class='img-fluid rounded-circle' style='width: 50px; height: 50px;'>";
            }
            echo "</td>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . $row["student_class"]. "-" .$row["section"] .  "</td>";
           
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>";
            echo "<form action='show.php' method='get' style='display: inline-block; margin-right: 5px;'>";
            echo "<input type='hidden' name='student_id' value='" . $row["student_id"] . "'>";
            echo "<button type='submit' class='btn btn-success btn-sm'>Show Details</button>";
            echo "</form>";
            // Form for edit button
            echo "<form action='edit_student.php' method='get' style='display: inline-block;'>";
            echo "<input type='hidden' name='student_id' value='" . $row["student_id"] . "'>";
            echo "<button type='submit' class='btn btn-primary btn-sm'>Edit</button>";
            echo "</form>";
            

            // Form for delete button
            echo "<form action='delete.php' method='get' style='display: inline-block; margin-left: 5px;'>";
            echo "<input type='hidden' name='student_id' value='" . $row["student_id"] . "'>";
            echo "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='7'>No students found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include 'footer.php'; ?>
