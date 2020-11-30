<?php
require '../conexion/conx.php';

// Guardamos los datos recibidos por post
$Id_json = $_POST['Id_json'];
$Direccion = $_POST['Direccion'];
$Ciudad = $_POST['Ciudad'];
$Telefono = $_POST['Telefono'];
$Codigo_Postal = $_POST['Codigo_Postal'];
$Tipo = $_POST['Tipo'];
$Precio = $_POST['Precio'];

// Validamos que todo venga con datos
if (!empty($Id_json) || !empty($Direccion) || !empty($Ciudad) || !empty($Telefono) || !empty($Codigo_Postal) || !empty($Tipo) || !empty($Precio)) {
    // Creamos la consulta
    $sql = "INSERT INTO bienes_guardados (id_json, direccion, ciudad, telefono, cod_post,tipo, precio) VALUES ('$Id_json', '$Direccion', '$Ciudad', '$Telefono', '$Codigo_Postal', '$Tipo', '$Precio')";
    // Guardamos en la base de datos
    if (mysqli_query($conx, $sql)) {
        echo "<script> alert('Datos guardados correctamente')
        window.location.href = '../#tabs-2';
        </script>";
    } else {
        echo "<script> alert('Hubo un error al guardar los datos, intente nuevamente')
        window.location.href = '../';
        </script>";
    }
} else {
    echo "<script> alert('Hubo un error al procesar los datos, intente nuevamente')
    window.location.href = '../';
    </script>";
}
mysqli_close($conx);
