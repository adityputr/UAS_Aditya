<?php

include 'koneksi.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM t_todo WHERE id = '$id'";
    $hasil_query = mysqli_query($conn,$query);

if(!$hasil_query) {
    die ("Query gagal dijalankan : ".mysqli_errno($conn).
    "-".mysqli_error($conn));
    }
}

header("location:session.php");

?>