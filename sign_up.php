<?php
    include('includes/header.php');
    
?>

<br> <br> <br>
<div class="container-p4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <br>
                <form action="sign_up.php" method="POST">
                    <img src="favicon.ico" class="rounded mx-auto d-block">
                    <br><br>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Enter your Email" autofocus>
                    </div>
                    <br>
                    <div class="form-goup">
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" autofocus>
                    </div>
                    <br>
                    <div class="form-goup">
                        <input type="password" name="comfirm_password" class="form-control" placeholder="Comfirm your password" autofocus>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success d-grid gap-2 col-4 mx-auto" name="dates" value="Registrarse">
                </form>
            </div>
        </div>

    </div>
</div>
<?php include('includes/footer.php'); ?>