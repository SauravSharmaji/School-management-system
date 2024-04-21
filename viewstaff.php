<?php include 'header.php'; ?>


<?php
include 'config.php';
$query = "SELECT `id_staff`, `full_name`, `email`, `phone`, photo_path FROM `staff`";
$result = mysqli_query($conn, $query);

if ($result) {
?>
<div class="container">
    <h1 class="mt-5 mb-4">Staff Data</h1>
    <table class="table border rounded-1">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col">Profile Photo</th>
            <th scope="col">Staff Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td>
                    <?php if (!empty($row["photo_path"])): ?>
                        <img src="<?php echo $row["photo_path"]; ?>" alt="Profile Photo" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                    <?php else: ?>
                        <img src="img/profile.jpg" alt="Default Profile Photo" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                    <?php endif; ?>
                </td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                <form action="show.php" method="get" style="display: inline-block; margin-right: 5px;">
                        <input type="hidden" name="id_staff" value="<?php echo $row["id_staff"]; ?>">
                        <button type="submit" class="btn btn-success btn-sm">Show Details</button>
                    </form>
                    <form action="edit_staff.php" method="get" style="display: inline-block;">
                        <input type="hidden" name="id_staff" value="<?php echo $row["id_staff"]; ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                    </form>
                    <form action="delete.php" method="get" style="display: inline-block; margin-left: 5px;">
                        <input type="hidden" name="id_staff" value="<?php echo $row["id_staff"]; ?>">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this staff?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</div>
<?php
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php include 'footer.php'; ?>