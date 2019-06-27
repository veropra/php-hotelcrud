<?php
  include 'data_config.php';

  $connessione = new mysqli($servername, $username, $password, $dbname);

  if ($connessione && $connessione->connect_error) {
    echo ("Connessione fallita: " . $connessione->connect_error);
    exit();
  }

  $sql = "SELECT * FROM stanze";
  $result = $connessione->query($sql);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>php-hotelcrud</title>
    <link rel="stylesheet" href="public/css/php-hotelcrud.css">
  </head>
  <body>
    <header>
      <div class="container">
        <img src="https://cdn.worldvectorlogo.com/logos/elvis-presley-s-heartbreak-hotel.svg">
        <nav>
          <a href="#">Home</a>
          <a href="#">Storia</a>
          <a href="#">Contatti</a>
          <a href="#">Prenota una stanza</a>
        </nav>
      </div>
    </header>
    <div class="title">
      <h2>Visualizzazione di tutte le stanze di Heartbreak Hotel:</h2>
    </div>
    <div class="container_col">
      <div class="row">
        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Room Number</th>
                <th class="text-center">Floor</th>
                <th class="text-center">Beds</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Updated At</th>
                <th class="text-center">Information</th>
              </tr>
            </thead>
            <?php
            if($result) {
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["room_number"] ?></td>
                    <td><?php echo $row["floor"] ?></td>
                    <td><?php echo $row["beds"] ?></td>
                    <td><?php echo $row["created_at"] ?></td>
                    <td><?php echo $row["updated_at"] ?></td>
                    <td><a href="show.php" >Dettagli</a></td>
                  </tr>
              <?php  }
              } else {
                echo 'non ci sono risultati!';
              }
              } else {
                echo 'si è verificato un errore!';
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
