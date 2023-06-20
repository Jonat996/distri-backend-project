<?php 
include("../conexion.php");
if(isset($_POST ['Guardar'])){
    echo'guardado';
    $name=$_POST ['name'];
    $phone =intval($_POST ['phone']);
    $date=$_POST ['date'];
    $address=$_POST ['address'];
    $email =$_POST ['email'];
       echo $name;
    echo $phone;
    echo $date;
    echo $email;
    echo $address;
    $query = "INSERT INTO CONTACTOS (name, phone, date, address, email) VALUES ('$name','$phone','$date','$address','$email')";
    echo "pasé";
    
    try {
        $result=  mysqli_query($conn,$query);
    } catch (\Throwable $th) {
        echo $th;
    }
    echo "pasé2";
    if (!$result) {
        die("falló consulta");
    }
    $_SESSION['message']="Contacto Agregado";
    $_SESSION['message_type']="success";

    header("location:../../index.php");
}else{
    echo'something is wrong...';
}
?>