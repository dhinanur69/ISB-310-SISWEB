<?php
include 'koneksi.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $hapus = mysqli_query($conn,"DELETE FROM user WHERE id='$id'");

    if($hapus){
        echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
    }else{
        echo "<script>alert('Gagal menghapus data');window.location='index.php';</script>";
    }

}else{
    header("location:index.php");
}
?>