<?php 
    session_start();
    if(isset($_SESSION['isAuth'])){ 
        header("Location:./index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php include "./Navbar.php" ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6" id="register-container">

                <?php if(isset($_REQUEST['error'])){  ?>
                    <span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
                 <?php } ?>
                <form class = "form" action="controllers/login.php" method="post" hiden>
                    <div class = "form-group">
                        <label>email:</label>
                        <input type  = "text" id = "email" name="email" class = "form-control" >
                    </div>
                    <div class = "form-group">
                        <label>password:</label>
                        <input type  = "text" id = "password" name="password" class = "form-control">
                    </div>
                    <br>
                    <div class = "form-group">
                        <button type="submit" id="" class = "btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>