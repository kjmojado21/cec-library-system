
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid my-3">
        <?php include 'navbar.php' ?>
        <div class="bg-info p-5">
            <h1 class="display-4 text-light text-center">
                REGISTER HERE
            </h1>
        </div>
    </div>
    <div class="container mt-5">
        <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <input type="text" name="fname" placeholder="Enter firstname" id="" class="form-control">
                </div>
                <div class="col-6">
                    <input type="text" placeholder="Enter lastname" name="lname" id="" class="form-control">
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <input type="date" data-bs-toggle="tooltip" title="Enter Birthdate" data-bs-placement="top" name="bdate" id="" class="form-control">
                </div>
                <div class="col-6">
                    <input type="text" placeholder="Enter contact number" name="contact_info" id="" class="form-control">
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <input type="text" name="username" placeholder="Enter Username" id="" class="form-control">
                </div>
                <div class="col-6">
                    <input type="password" placeholder="Enter Password" name="password" id="" class="form-control">
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <select name="department" id="" class="form-control">
                        <option value="" disabled hidden selected>Choose a department</option>
                        <?php
                        foreach (get_departments() as $row) :
                        ?>
                            <option value="<?php echo $row['department_name'] ?>"><?php echo $row['department_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-8">

                </div>
                <div class="col-4 d-grid">
                    <button type="submit" name="register" class="btn btn-outline-info">Register</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">


        <?php

        if (isset($_POST['register'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $bdate = $_POST['bdate'];
            $contact_info = $_POST['contact_info'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $department = $_POST['department'];

            $login_id = insert_into_login($username, $password);

            if (!empty($login_id)) {
                register_user($fname, $lname, $bdate, $contact_info, $department,$login_id);
            }else{
                echo "<div class = 'alert alert-danger mt-5'>ERROR!</div>";
            }
        }
        ?>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>