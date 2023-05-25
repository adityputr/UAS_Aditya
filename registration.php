<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: session.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero"></div>
    <div class="container dfg">
        <br>
        <h3 style="text-align: center;">Register</h3>
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"Semua kolom harus terisi!");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email tidak valid!");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password minimal 8 karakter!");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password tidak sesuai!");
           }
           require_once "koneksi.php";
           $sql = "SELECT * FROM t_user WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email sudah digunakan!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO t_user (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Pendaftaran berhasil!.</div>";
            }else{
                die("Oops! Terjadi kesalahan");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="fullname">Nama Lengkap </label>
                <input type="text" class="form-control" name="fullname" placeholder="ex: Aditya Putra">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="ex: aditya@gmail.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="submit">Repeat Password</label>
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <br>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Sudah punya akun? <a href="index.php">Login</a></p></div>
      </div>
    </div>
</body>
</html>