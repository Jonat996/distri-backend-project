<?php include("../conexion.php");

if(isset($_GET["id"])){
    $id= $_GET["id"];
    $query = "DELETE FROM CONTACTOS WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("something is wrong!");
    }
  $_SESSION['message']="Tarea Removida";
    $_SESSION['message_type']="danger";
    header("location:../../index.php");
}

?>