<?php 
 include 'functions/functions.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid my-5">
        <div class="card mt-5 w-25 mx-auto">
            <div class="card-header text-center bg-info text-light p-5">
                <img src="images/download.png" height="400" width="50" class="card-img-top rounded-circle" alt="">
                <p class="lead mt-5">
                    CEBU EASTERN COLLEGE ONLINE LIBRARY SYSTEM
                </p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                  <div class="input-group">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                      <input type="text" name="username" placeholder="Username" id="" class="form-control">
                  </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" placeholder="Password" id="" class="form-control">
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" name="login" class="btn btn-outline-info">Login</button>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['login'])){
                        $uname = $_POST['username'];
                        $pword = $_POST['password'];

                        login($uname,$pword);


                    }
                
                ?>
            </div>
            <div class="card-footer">
                <a href="register.php" class="text-decoration-none">No account? Sign Up Here</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>