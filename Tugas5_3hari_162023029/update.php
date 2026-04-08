<?php
include 'koneksi.php';

if(!isset($_GET['id'])){
    header("location:index.php");
    exit;
}

$id = intval($_GET['id']); 

$data = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(!$d){
    echo "Data not found.";
    exit;
}

$error = "";

if(isset($_POST['update'])){

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    if($username == "" || $email == ""){
        $error = "Fields cannot be empty.";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email address.";
    }
    else{

        $update = mysqli_query($conn, "UPDATE user SET username='$username', email='$email' WHERE id='$id'");

        if($update){
            echo "<script>alert('User has been successfully updated.');window.location='index.php';</script>";
        }else{
            $error = "Failed to update data.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">

    <h2>Update Data</h2>

    <form method="POST">

        <label>Name:</label>
        <input type="text" name="username"
        value="<?= isset($_POST['username']) ? $_POST['username'] : $d['username']; ?>">

        <label>Email:</label>
        <input type="text" name="email"
        value="<?= isset($_POST['email']) ? $_POST['email'] : $d['email']; ?>">

        <?php if($error != ""){ ?>
            <div class="error"><?= $error ?></div>
        <?php } ?>

        <button class="btn" name="update">Update</button>

    </form>

    <div class="nav">
        <a href="create.php">CREATE</a>
        <a href="index.php">READ</a>
    </div>

</div>

</body>
</html>