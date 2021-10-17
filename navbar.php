<?php 
include 'functions/functions.php'
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="library_dashboard.php"><img src="images/download.png" height="50" width="50" class="rounded-circle" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <?php if(empty($_SESSION)){ ?>
                        <a href="index.php" class="nav-link">Login</a>
                 <?php  }else{ ?>
                    <?php if($_SESSION['session_status'] == 'S'){ ?>
                        <a class="nav-link" href="library_dashboard.php">Student Dashboard <span class="visually-hidden">(current)</span></a>

                    <?php }elseif($_SESSION['session_status'] == 'A'){ ?>
                        <a class="nav-link" href="admin.php">Admin Dashboard <span class="visually-hidden">(current)</span></a>
                    
                <?php }
                }?>   
                   
                </li>
                <li class="nav-item">

                
                    <?php if(!empty($_SESSION['session_id']) AND $_SESSION['session_status'] == 'S'){ ?>
                        <a class="nav-link" href="reserved_books.php">Reserved books history <span class="badge bg-danger "><?php 
                                if(!empty(get_student_reserved_books($_SESSION['session_id']))){
                                    echo count(get_student_reserved_books($_SESSION['session_id']));
                                }else{
                                    echo 0;
                                }
                            ?></span> </a>
                    <?php }elseif(!empty($_SESSION['session_id']) AND $_SESSION['session_status'] == 'A'){ ?>
                        <a href="borrowed_books.php" class="nav-link">Borrowed Books</a>
                   <?php } ?>

                </li>
                <li class="nav-item dropdown">
                   

                    <?php if(!empty($_SESSION['session_id']) AND $_SESSION['session_status'] == 'S'){ ?>
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <!-- <a class="dropdown-item" href="#">Profile</a> -->
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    <?php }elseif(!empty($_SESSION['session_id']) AND $_SESSION['session_status'] == 'A'){ ?>
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a href="add_genre.php" class="dropdown-item">Add Genre</a>
                        <!-- <a href="" class="dropdown-item">Add Categories</a> -->
                        <!-- <a class="dropdown-item" href="#">Profile</a> -->
                        <a class="dropdown-item" href="logout.php">Logout</a>
                   <?php } ?>
                        
                    </div>
                </li>
            </ul>
            <form class="d-flex my-2 my-lg-0">
                <!-- <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            </form>
        </div>
    </div>
</nav>

<?php if($_SESSION['session_status'] == 'S' AND count_student_currently_borrowed_books($_SESSION['session_id']) == 1): ?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>You have already borrowed 2 books from the library.Borrowing book has been disabled temporarily  </strong> 
   </div>
   
   <script>
     var alertList = document.querySelectorAll('.alert');
     alertList.forEach(function (alert) {
       new bootstrap.Alert(alert)
     })
   </script>
   

<?php endif; ?>

