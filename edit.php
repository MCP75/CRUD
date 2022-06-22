<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $estado_fav = $row['favorite'];
        if($estado_fav==0 ){
            $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
            mysqli_query($conn, $query);
            $_SESSION['message'] = 'Tarea actualizada';
            $_SESSION['message_type'] = 'warning';
        }else{
            $_SESSION['message'] = 'No se puede editar';
            $_SESSION['message_type'] = 'warning';
        }
        

        
        header("Location: index.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-goup">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
                    </div>
                    <br>
                    <div class="form-goup">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"> <?php echo $description; ?></textarea>
                    </div>
                    <br>
                    <button class="btn btn-success d-grid gap-2 col-4 mx-auto" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>