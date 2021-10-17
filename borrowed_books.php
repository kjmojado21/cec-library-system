<?php




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
        <?php include 'navbar.php'; ?>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-3">
                <?php include 'admin-sidebar.php' ?>
            </div>
            <div class="col-9">
                <?php if (get_borrowers_name() !== FALSE) { ?>
                    <?php foreach (get_borrowers_name() as $row) : ?>

                        <div class="accordion mt-3" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $row['student_id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <?php echo $row['fname'] . " " . $row['lname'] ?>
                                    </button>
                                </h2>
                                <div id="collapseOne<?php echo $row['student_id'] ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table table-secondary">
                                            <thead>
                                                <th>Book Name</th>
                                                <th>Date Borrowed</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                                <th>Penalty Status</th>

                                            </thead>
                                            <tbody>

                                                <?php foreach (get_student_reserved_books($row['student_id']) as $books_row) : ?>
                                                    <tr>
                                                        <td><?php echo $books_row['book_name'] ?></td>
                                                        <td><?php echo $books_row['date_borrowed'] ?></td>
                                                        <?php
                                                        if ($books_row['status'] == 'RETURNED') {
                                                            echo "<td><span class='badge bg-success'>RETURNED</span>";
                                                        } else {
                                                            echo "<td><span class='badge bg-danger'>BORROWED</span>";
                                                        }
                                                        ?>
                                                        <td><?php if ($books_row['status'] == 'BORROWED') { ?>
                                                                <form action="" method="post" class="d-inline">
                                                                    <input type="hidden" name="borrow_id" value="<?php echo $books_row['borrow_id'] ?>">
                                                                    <button type="submit" name="change_borrow_status" class="btn btn-success">RETURNED</button>
                                                                </form>
                                                                <?php
                                                                if (isset($_POST['change_borrow_status'])) {
                                                                    $borrow_id = $_POST['borrow_id'];
                                                                    update_borrow_status($borrow_id);
                                                                }
                                                                ?>

                                                                <!-- <button type='submit' name="penalize" class="btn btn-danger">PENALIZE</button> -->
                                                            <?php } ?>
                                                        </td>
                                                        <?php
                                                        $date = get_book_date_only($books_row['borrow_id']);
                                                        $dayFromDb = intval($date['day']);

                                                        $current_date = date("d");
                                                        $validate_penalty =  $current_date - $dayFromDb;
                                                        $penalty = 5;
                                                        $penaltyPay = ($validate_penalty - 2) * $penalty;

                                                        ?>
                                                        <td><?php if ($validate_penalty > 3) { ?>
                                                                <span class="badge bg-danger">Penalty to pay: <?php echo $penaltyPay ?></span>
                                                            <?php  } else {
                                                                echo ' <span class="badge bg-success">No Penalty</span>';
                                                            } ?>
                                                        </td>

                                                    </tr>
                                                <?php endforeach ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>
                <?php } else {
                    echo "<div class = 'alert alert-success w-50 mx-auto text-center'>ALL BOOKS ARE AVAILABLE</div>";
                } ?>

            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>