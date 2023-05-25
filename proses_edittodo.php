<?php

if (isset($_POST['edit'])) {
include ('koneksi.php');

    $id = $_POST['id'];
    $todo = $_POST['todo'];

    $query = "UPDATE t_todo SET todo = '$todo' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

if(!$result) {
    die ("Query gagal dijalankan : ".mysqli_errno($conn).
    "-".mysqli_error($conn));
    }
}

header("location:session.php");

?>