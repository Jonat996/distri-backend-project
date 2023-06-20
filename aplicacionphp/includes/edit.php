<?php include("../conexion.php");

$name = '';
$phone= '';
$date= '';
$address= '';
$email= '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM CONTACTOS WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $phone = $row['phone'];
    $date = $row['date'];
    $address = $row['address'];
    $email = $row['email'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
    $phone = intval($_POST ['phone']);
    $date = $_POST ['date'];
    $address = $_POST ['address'];
    $email = $_POST ['email'];

  $query = "UPDATE CONTACTOS set name = '$name', phone = '$phone', date = '$date', address = '$address', email = '$email' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Contacto Actualizado';
  $_SESSION['message_type'] = 'success';
  header('Location: ../../index.php');
}

?>
<?php include('header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="phone" type="text" class="form-control" value="<?php echo $phone; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="date" type="date" class="form-control" value="<?php echo $date; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="address" type="text" class="form-control" value="<?php echo $address; ?>" placeholder="Update Title">
        </div><div class="form-group">
          <input name="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder="Update Title">
        </div>

        <button class="btn btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
