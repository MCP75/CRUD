<?php

    include('../db.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            die("Operacion fallida");
        }
        $_SESSION['message'] = 'Tarea removida exitosamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../user.php");
    }

?>