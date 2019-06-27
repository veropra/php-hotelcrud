<?php
  include 'data_config.php';

  $connessione = new mysqli($servername, $username, $password, $dbname);

  if ($connessione && $connessione->connect_error) {
    echo ("Connessione fallita: " . $connessione->connect_error);
    exit();
  }
  $id_stanza = intval($_GET['id']);

  $sql = "SELECT * FROM stanze WHERE id= $id_stanza";
  $result = $connessione->query($sql);

?>

<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
?>
<div class="title">
  <h2>Visualizzazione di ogni stanza di Heartbreak Hotel:</h2>
</div>
<?php
vardump($id_stanza);
 ?>
</body>
</html>
