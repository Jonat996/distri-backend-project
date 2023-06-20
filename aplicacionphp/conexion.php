<?php
session_start();
$conn = mysqli_connect(
'localhost',
'root',
'',
'AGENDA'
);
if(isset($conn)){
    echo 'is connected';
}else{
    echo 'error!';
}

?>