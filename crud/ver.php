<?php
require 'conexion/conx.php';

$sql = 'SELECT * FROM bienes_guardados';
$resultados = mysqli_query($conx,$sql);