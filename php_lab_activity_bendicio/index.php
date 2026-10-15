
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-5">User Management System</h1>

    <?php if (isset($_GET['msg'])): ?>
        <?php if ($_GET['msg'] == 'added'): ?>
            <div class="alert alert-success">User added successfully!</div>
        <?php elseif ($_GET['msg'] == 'updated'): ?>
            <div class="alert alert-warning">User updated successfully!</div>
        <?php elseif ($_GET['msg'] == 'deleted'): ?>
            <div class="alert alert-danger">User deleted successfully!</div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4">
            <h4>Add New User</h4>
            <form method="post" action="process.php">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required>
                </div>
                <button type="submit" name="btnsubmit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>

        <div class="col-md-8">
            <h4>Registered Users</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'dbcon.php';
                    $result = $conn->query("SELECT * FROM users ORDER BY id DESC");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php
                        endwhile;
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

