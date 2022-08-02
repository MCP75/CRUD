<?php

include("../db.php");

if (isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task (title, description, favorite) VALUES ('$title', '$description', 0)";
    $result = mysqli_query($conn,$query);
    if (!$result){
        die("Consulta fallida");
    }

    $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../user.php");
    
}
?>