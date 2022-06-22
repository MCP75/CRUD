<?php 
    
    include('db.php');
    
    if(isset($_GET['id'])){
        $_SESSION['message'] = 'No se puede eliminar la tarea';
        $_SESSION['message_type'] = 'danger';
    header('location: index.php');
    }

?>