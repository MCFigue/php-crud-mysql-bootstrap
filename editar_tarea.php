<?php
include("conexion_db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE Id=$id";
  $result = mysqli_query($sconn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];

  $query = "UPDATE task set title = '$title', description = '$description' WHERE Id=$id";
  mysqli_query($sconn, $query);
  $_SESSION['message'] = 'Tarea editada y actualizada';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_tarea.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control mb-2" value="<?php echo $title; ?>" placeholder="Introduce el titulo">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control mt-2 mb-2"   placeholder="Introduce la descripción"   cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <div class="d-grid gap-2">
        <button class="btn btn-success " name="update">
          Actualizar
        </button>
        </div>
        
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>