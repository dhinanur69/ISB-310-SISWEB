<?php
include 'koneksi.php';

$error = "";

if(isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    if($username == "" || $email == ""){
        $error = "Fields cannot be empty.";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email address.";
    }
    else{

        $cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' OR email='$email'");

        if(mysqli_num_rows($cek) > 0){
            $error = "This email is already registered. Please try another.";
        }else{

            $simpan = mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$username','$email')");

            if($simpan){
                echo "<script>alert('User has been successfully inserted.');window.location='index.php';</script>";
            }else{
                $error = "Failed to save data.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">

    <h2>Create Data</h2>

    <form method="POST">

        <label>Name:</label>
        <input type="text" name="username" placeholder="Your name"
        value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">

        <label>Email:</label>
        <input type="text" name="email" placeholder="Your email"
        value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">

        <?php if($error != ""){ ?>
            <div class="error"><?= $error ?></div>
        <?php } ?>

        <button class="btn" name="submit">Insert</button>

    </form>

    <div class="nav">
        <a href="create.php">CREATE</a>
        <a href="index.php">READ</a>
    </div>

</div>

</body>
</html>