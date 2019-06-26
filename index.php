<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "db_hotel";
  // Connect
  $connessione = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($connessione && $connessione->connect_error) {
    echo ("Connessione fallita: " . $connessione->connect_error);
  }else{
    echo ("Connessione effettuata: ");
  }

  $number = $_GET{'number'};
  $sql = "SELECT room_number, floor FROM stanze";
  $result = $connessione->query($sql);
  if ($result && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor'];
  }
  } elseif ($result) {
  echo "0 results";
  } else {
  echo "query error";
  }
  
  $connessione->close();
?>
