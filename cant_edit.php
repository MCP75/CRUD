<?php
    include('db.php');
    
    if(isset($_GET['id'])){
        $_SESSION['message'] = 'No se puede editar la tarea';
        $_SESSION['message_type'] = 'warning';
        header('location: index.php');

    }
    
?>