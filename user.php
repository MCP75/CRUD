<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        
        <?php if(isset($_SESSION['message'])) { ?> 
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert" >
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        <?php session_unset(); } ?>

        <div class="col-md-4">
            <div class="card card-body">
                <form action="controller/add_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" rows="3" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block d-grid gap-2 col-4 mx-auto" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
        
        
        
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><i class="fa-solid fa-star"></i></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>  
                          
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result_tasks);
                    
                    while($row = mysqli_fetch_array($result_tasks)) { 
                        if($row['favorite'] == 1){
                        $format_star = 'solid';
                        $format_trash = 'fa-solid fa-ban';
                        $format_pen = 'fa-solid fa-ban';
                        $format_edit = 'cant_edit.php';
                        $format_delete = 'cant_delete.php';
                        }
                        if($row['favorite'] == 0){
                        $format_star='regular';
                        $format_trash = 'fa-solid fa-trash-can';
                        $format_pen = 'fa solid fa-pen';
                        $format_edit = 'controller/edit.php';
                        $format_delete = 'controller/delete_task.php';
                        }?>
                        <tr>
                            <td>
                                <a href="controller/favorite.php?id=<?php echo $row['id']?>" class="text text-warning"><i class="fa-<?php echo $format_star;?> fa-star"></i></a>
                            </td>   
                            <td> <?php echo $row['title']?> </td>
                            <td> <?php echo $row['description']?> </td>
                            <td> <?php echo $row['created_at']?> </td>
                            <td> <a href="<?php echo $format_edit; ?>?id=<?php echo $row['id']?>"
                            class="btn btn-secondary"><i class="<?php echo $format_pen; ?>"></i></a>
                            <a href="<?php echo $format_delete ?>?id=<?php echo $row['id']?>"
                            class="btn btn-danger" ><i class="<?php echo $format_trash;?>"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>