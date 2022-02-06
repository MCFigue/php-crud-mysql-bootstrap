<?php


include("conexion_db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM task WHERE Id = $id";
  $result = mysqli_query($sconn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tarea removida exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>