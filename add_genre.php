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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container-fluid">
        <?php include 'navbar.php'; ?>
      </div>
      <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-6">
                <div class="alert alert-info text-center" role="alert">
                   ADD A BOOK GENRE
                </div>
                <form action="" method="post">
                    <input type="text" name="genre_name" placeholder="Genre name" id="" class="form-control">
                    <button type="submit" name="save-genre" class="btn btn-outline-info mt-3">Save Genre</button>

                </form>
                <?php
                    if(isset($_POST['save-genre'])){
                        $genre = $_POST['genre_name'];
                        add_genre($genre);
                    }
                ?>
                
            </div>
            <div class="col-6">
                    <table class="table table-info">
                        <thead>
                            <th>Genre ID</th>
                            <th>Genre</th>
                            <th>Option</th>
                        </thead>
                        <tbody>
                            <?php foreach(get_genre() as $row): ?>
                                <tr>
                                    <td><?php echo $row['genre_id'] ?></td>
                                    <td><?php echo $row['genre'] ?></td>
                                    <td><a href="delete.php?genre_id=<?php echo $row['genre_id'] ?>" class="btn btn-danger">Delete Genre</a></td>
                                </tr>
                            <?php endforeach ?>    
                        </tbody>
                    </table>
            </div>
        </div>
      </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>