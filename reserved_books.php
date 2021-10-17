<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container-fluid my-3">
            <?php include 'navbar.php' ;
                // print_r(get_student_reserved_books($_SESSION['session_id']));
            ?>
      </div>
      
      <div class="container">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Note</h4>
            <p>Please take care of the borrowed book. Negligence is subject for penalty </p>
            <p>Also please return the borrowed book on time. Late return is also subject for penalty </p>
            <hr>
            <p class="mb-0">Thank you</p>
          </div>
      </div>
      <div class="container-fluid mt-3">
            <table class="table table-info table-hover table-striped table-bordered">
                <thead>
                    <th>
                        Book Name
                    </th>
                    <th>
                        Book Genre
                    </th>
                    <th>
                        Date Borrowed
                    </th>
                    <th>
                       Book Status
                    </th>
                    
                </thead>
                <tbody>
                    <?php if(get_student_reserved_books($_SESSION['session_id']) == !FALSE ){ ?>
                    <?php foreach( get_student_reserved_books($_SESSION['session_id']) as $row): 
                        $date = get_book_date_only($row['borrow_id']);
                        $dayFromDb = intval($date['day']);
                       
                         $current_date = date("d");
                         $validate_penalty =  $current_date - $dayFromDb;
                         $penalty = 5;
                         $penaltyPay = ($validate_penalty - 2) * $penalty;

                        //  echo $validate_penalty;
                        
                        ?>
                        <tr>
                            <td><?php echo $row['book_name'] ?></td>
                            <td><?php echo $row['book_genre'] ?></td>
                            <td><?php echo $row['date_borrowed'] ?></td>
                            <td><span class="badge bg-secondary"><?php echo $row['status'] ?></span>
                            <?php if($validate_penalty > 3){ ?>
                                <span class="badge bg-danger float-end">Penalty to pay: <?php echo $penaltyPay ?></span>
                          <?php  } ?>
                          </td>
                        </tr>
                    <?php  endforeach;
                    }else{ ?>
                       <tr>
                           <td colspan="4">
                               <p class="text-center">
                                   YOU HAVE NO BORROWED BOOKS YET
                               </p>
                           </td>
                       </tr>
                   <?php }
                    ?>
                </tbody>

            </table>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>