<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud' // Base de datos y (Tabla -> "task")
);
?>