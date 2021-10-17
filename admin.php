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

<body class="">

  <div class="container-fluid my-3">
    <?php include 'navbar.php'; ?>
  </div>
  <div class="container-fluid">
    <!-- add books-->
    <div class="row">
      <div class="col-4">
        <?php include 'admin-sidebar.php'; ?>
      </div>
      <div class="col-8">
        <div class="bg-info p-5 text-light text-center">
          <p class="lead">
            ADD BOOKS
          </p>
        </div>
        <form action="" method="post" class="">
          <div class="row mt-3">
            <div class="col-lg-6">
              <input type="text" name="book_name" placeholder="Book name" id="" class="form-control">
            </div>
            <div class="col-lg-6">
              <input type="text" name="book_code" placeholder="Book code" id="" class="form-control">
            </div>

          </div>
          <div class="row mt-3">
            <div class="col-lg-4">
              <textarea name="book_desc" id="" class="form-control" cols="30" rows="10">Book Summary</textarea>
            </div>
            <div class="col-lg-6">
              <select name="book_genre" class="form-control" id="">
                <option value="" selected disabled hidden>Book Genre</option>
                <?php foreach (get_genre() as $row) : ?>
                  <option value="<?php echo $row['genre'] ?>"><?php echo $row['genre'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-2">
              <input type="number" name="book_count" placeholder="Book count" class="form-control" id="">
            </div>

          </div>
          <div class="d-grid mt-3">
            <button type="submit" name="save_book" class="btn btn-outline-info btn-lg">Save Book</button>
          </div>
        </form>
      </div>
    </div>

  </div>
  <?php
  if (isset($_POST['save_book'])) {
    $bookName = $_POST['book_name'];
    $bookCode = $_POST['book_code'];
    $bookDesc = $_POST['book_desc'];
    $bookGenre = $_POST['book_genre'];
    $bookCount = $_POST['book_count'];


    add_book($bookName, $bookCode, $bookDesc, $bookGenre, $bookCount);
  }
  ?>



  <!-- manage borrowed books-->
  <hr>
  <div class="container-fluid mt-5">
    <div class="alert alert-info text-center w-50 mx-auto" role="alert">
      BOOK LIST
    </div>
    <div class="row mb-5">
      <?php
      foreach (dynamic_select('books') as $row) :
      ?>

        <div class="col-3">
          <div class="card mt-3">
            <div class="card-header">
                
              <?php if (empty($row['book_img'])) { ?>
                <img src="images/book-placeholder.jpg" height="300" alt="" class="card-img-top mb-3">
              <?php } else { ?>
                <img src="uploads/<?php echo $row['book_img'] ?>" alt="" class="card-img-top mb-3">
              <?php } ?>
              <span class="badge bg-danger float-end">
                  Book count: <?php echo $row['book_count'] ?>
                </span>
            </div>
            <div class="card-body">
              <figure class="text-center">
                <blockquote class="blockquote">
                  <p><?php echo $row['book_name'] ?></p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
              </figure>
            </div>
            <div class="card-footer">
              <a href="delete.php?book_id=<?php echo $row['book_id'] ?>" class="btn btn-danger">Delete this book</a>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modelId_<?php echo $row['book_id'] ?>">
                Upload book image
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modelId_<?php echo $row['book_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Upload image for <?php echo $row['book_name'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <form action="" method="post" enctype="multipart/form-data">
                          <input type="file" name="filename" class="form-control" id="">
                          <input type="hidden" name="id" value="<?php echo $row['book_id'] ?>" class="form-control" id="">


                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="upload" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              if (isset($_POST['upload'])) {
                $filename = $_FILES['filename']['name'];
                $id = $_POST['id'];
                $dir = 'uploads/';
                $target_dir = $dir . basename($filename);

                $validate = dynamic_upload('books', 'book_img', $filename, 'book_id', $id);

                if ($validate == 1) {
                  move_uploaded_file($_FILES['filename']['tmp_name'], $target_dir);
                  echo "<script>window.location.href = 'admin.php'</script>";
                } else {
                  echo "error";
                }
              }

              ?>

              <script>
                var modelId = document.getElementById('modelId');

                modelId.addEventListener('show.bs.modal', function(event) {
                  // Button that triggered the modal
                  let button = event.relatedTarget;
                  // Extract info from data-bs-* attributes
                  let recipient = button.getAttribute('data-bs-whatever');

                  // Use above variables to manipulate the DOM
                });
              </script>

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