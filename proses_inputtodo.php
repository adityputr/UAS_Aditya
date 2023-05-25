<?php

include 'koneksi.php';
if (isset($_POST['input'])) {
    $todo = $_POST['todo'];

    $query = "INSERT INTO t_todo VALUES (NULL, '$todo')";
    $result = mysqli_query($conn,$query);

if(!$result) {
    die ("Query gagal dijalankan : ".mysqli_errno($conn).
    "-".mysqli_error($conn));
    }
}

header("location:session.php");

?>