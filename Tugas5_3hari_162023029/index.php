<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>Read Data</h2>

<?php
$data = mysqli_query($conn,"SELECT * FROM user");

if(mysqli_num_rows($data) > 0){
    while($d = mysqli_fetch_array($data)){
?>

<div class="item">
    <b><?= $d['username']; ?></b><br>
    <small><?= $d['email']; ?></small>

    <div class="aksi">
        <a class="edit" href="update.php?id=<?= $d['id']; ?>">Edit</a>
        <a class="delete" href="delete.php?id=<?= $d['id']; ?>" 
        onclick="return confirm('are you sure?')">Delete</a>
    </div>
</div>

<?php 
    }
}else{
    echo "<p style='text-align:center;'>Belum ada data</p>";
}
?>

<div class="nav">
    <a href="create.php">CREATE</a>
    <a href="index.php">READ</a>
</div>

</div>

</body>
</html>