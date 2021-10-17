<?php
$book_id = $_GET['book_id'];

?>
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
        <?php include 'navbar.php';
        $row = get_specific_book_detail($book_id);

        ?>
    </div>
    <div class="container">
    <?php 
        if(isset($_POST['reserve'])){
            $book_id = $_POST['book_id'];
            $student_id = $_POST['student_id'];

            reserve_book($book_id,$student_id);
        }
    
    ?>
        <div class="row mb-5">
            <div class="col-6 border p-5 ">
                <form action="" method="post">
                        <input type="hidden" name="student_id" value="<?php echo $_SESSION['session_id'] ?>">
                        <input type="hidden" name="book_id" value="<?php echo $row['book_id'] ?>">

                    <figure class="text-center mt-5">
                        <blockquote class="blockquote">
                            <p><?php echo $row['book_name'] ?>.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                    </figure>
                    <dl class="row mt-5">
                        <dt class="col-sm-3">Description</dt>
                        <dd class="col-sm-9"><?php echo $row['book_desc'] ?>.</dd>

                        <dt class="col-sm-3">Book Code</dt>
                        <dd class="col-sm-9">
                            <p><?php echo $row['book_code'] ?></p>

                        </dd>
                    </dl>
                    <div class="d-grid">
                        <button type="submit" name="reserve" class="btn btn-outline-info">Reserve book</button>
                    </div>
            </div>
            <div class="col-6 border">
                <?php 
                    if(!empty($row['book_img'])){ ?>
                        <img src="uploads/<?php echo $row['book_img'] ?>" class="img-thumbnail w-100" alt=""> 
                 <?php    }else{ ?>
                        <img src="images/book-placeholder.jpg" class="img-thumnail w-100" alt="">
                <?php }
                ?>
                <!-- to be changed to dynamic image -->
            </div>
        </div>
    </div>
    </form>

    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>