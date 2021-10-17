<?php
$genre = $_GET['genre'];


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

        // echo count_student_currently_borrowed_books($_SESSION['session_id']);
        // die(); 
        ?>
    </div>
    <div class="container">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php foreach (get_specific_books($genre) as $row) :
                $book_count = intval(get_specific_book_count($row['book_id']));
                $reserved_book = get_specific_reserved_book($row['book_id'], 'BORROWED');
                $total_count = $book_count - get_specific_reserved_book($row['book_id'], 'BORROWED');


            ?>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_<?php echo $row['book_id'] ?>" aria-expanded="false" aria-controls="flush-collapse_<?php echo $row['book_id'] ?>">
                            <?php echo $row['book_name'] ?>
                        </button>
                    </h2>
                    <div id="flush-collapse_<?php echo $row['book_id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p class="text-truncate"><?php echo $row['book_desc'] ?></p>

                            <?php if ($total_count > 0) {
                                if (count_student_currently_borrowed_books($_SESSION['session_id']) == 0) { ?>
                                    <a href="reserve_book.php?book_id=<?php echo $row['book_id'] ?>" class="btn btn-primary float-end position-relative">
                                        Available Copies
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            <?php echo $total_count ?>
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </a>
                                <?php
                                } else {
                                    echo "<span class = 'badge bg-danger'>Borrow option is not available</span>";
                                }
                                ?>
                            <?php } else {
                                echo "<span class = 'badge float-end bg-danger'>No copies available</span>";
                            } ?>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>