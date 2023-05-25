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
    <title>Input Data</title>
  </head>
<body>
   <br>
   <div class="hero"></div>
   <div class="container dfg">
    <form id="form_todo" action="proses_inputtodo.php" method="post">
        <br>
        <h3 style="text-align: center; color: white;">Input Data</h3><br>
            <div class="form-group">
                <input type="text" class="form-control" name="todo" id="todo" placeholder="Tulis aktifitasmu disini.">
            </div>
      <br>
                <p>
                    <input class="btn btn-transparant" type="submit" name="input" value="Simpan" style="color: white;">
                 </p>
            </form>
        </div>
    </body>
</html>