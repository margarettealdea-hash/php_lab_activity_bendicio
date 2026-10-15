<?php
$id = $_GET['id'];
?>
<form method = "post">
    <input type = "text" placeholder = "Enter Full Name" name = "name" required>
    <input type = "text" placeholder = "Enter Email" name = "email" required>
    <button type = "submit" name = "btnupdate">Update</button>
</form>

<?php
    include 'db_connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $firstname = $_POST['fname'];
        $email = $_POST['email'];

        $query = "UPDATE users SET first_name = '$fullname', email = '$email' WHERE id = '$id'";
        $result = $conn->query($query);

        if ($result) {
            echo "Record updated successfully!";
        }else{
            echo "Error: ". $conn->error;
        }
    }
?>