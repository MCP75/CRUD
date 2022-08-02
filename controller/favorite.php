<?php  
    include('../db.php');

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $query = "SELECT favorite from task WHERE id = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $estado_fav = $row['favorite'];  

        if($estado_fav == 1){
            $query = "UPDATE task SET favorite = 0 WHERE id = $id";
            mysqli_query($conn, $query);
            
            $_SESSION['message'] = 'Eliminado de favoritos';
            $_SESSION['message_type'] = 'danger';
        } 
        if($estado_fav == 0 ){
            $query = "UPDATE task SET favorite = 1 WHERE id = $id";
            mysqli_query($conn, $query);
            
            $_SESSION['message'] = 'Elemento marcado como favorito';
            $_SESSION['message_type'] = 'warning';
        }
        if(!$result){
            $_SESSION['message'] = 'Error al añadir a favoritos';
            $_SESSION['message_type'] = 'danger';
        }
        
        header('location: ../user.php');
    }



?>