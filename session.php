<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>User Dashboard</title>
  </head>
  <body>
    <div class="hero"></div>
    <div class="container" style="width: 80%; 
    backdrop-filter: blur(10px); 
    box-shadow: 0 15px 35px rgb(0, 0, 0, 0.2);
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.05);
    margin-top: 5%;
    margin-bottom: 5%;
    color: white;">

      <br />
      <h1 style="color: white; text-align: center">Are you ready to plan your day?</h1>
      <br />
      <a href="logout.php" class="btn btn-transparant" style="color: white;">Logout</a>
      <a href="inputtodo.php" class="btn btn-transparant" style="color: white;">Input Data</a>

        <h3 style="text-align: center; color: white"></h3>
        <table class="table table-transparent" style="color: white;">
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-sm-5">To Do</th>
                <th class="col-sm-1">Pilihan</th>
            </tr>

            <?php
              $query = "SELECT * FROM t_todo ORDER BY id ASC";
              $result = mysqli_query($conn, $query);

              if(!$result){
                die("Query error: ".mysqli_errno($conn) . " - ".mysqli_error($conn));
                
              }

              while ($data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>$data[id]</td>";
                echo "<td>$data[todo]</td>";

                echo '<td>
                <a href="edittodo.php?id='.$data['id'].'">Edit </a> /
                <a href="hapustodo.php?id='.$data['id'].'"
                   onclick="return confirm(\'Anda Yakin Akan Menghapus Data?\')">Hapus</a> 
               </td>';
               echo '</tr>';
               }

            ?>

        </table>
      </div>
    </div>
  </body>
</html>
