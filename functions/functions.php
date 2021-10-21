<?php
include 'functions/connection.php';


function get_departments()
{ // sql to get deparmtents table data
    $sql = "SELECT * FROM department";
    $result = db_connect()->query($sql); //exectution sa string query

    if ($result->num_rows > 0) { // validation if naay data
        $row = array();
        while ($rows = $result->fetch_assoc()) { // kuha data gkan database
            $row[] = $rows;
        }
        return $row;
    } else { //return false if wala
        return FALSE;
    }
}

function register_user($fname, $lname, $birtdate, $contact_info, $department, $login_id)
{ // code for doing registration
    $conn = db_connect();
    $sql = "INSERT INTO students(fname,lname,birthdate,contact_info,department,login_id) VALUES ('$fname','$lname','$birtdate','$contact_info','$department','$login_id')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "<div class = 'alert alert-success mt-3'>Registration Successfull.</div>";
    } else {
        die('ERROR :' . db_connect()->error);
    }
}

function insert_into_login($username, $password)
{
    $conn = db_connect();
    $sql = "INSERT INTO login(username,password) VALUES ('$username','$password')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return $conn->insert_id;
    } else {
        die('ERROR :' . db_connect()->error);
    }
}

function login($username, $password)
{
    $sql = "SELECT * FROM login INNER JOIN students ON login.login_id = students.login_id WHERE login.username ='$username' AND login.password = '$password'";

    $result = db_connect()->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['status'] == 'S') {
            $_SESSION['session_id'] = $row['login_id'];
            $_SESSION['session_fname'] = $row['fname'];
            $_SESSION['session_lname'] = $row['lname'];
            $_SESSION['session_status'] = $row['status'];

            header('location:library_dashboard.php');
        } else {
            $_SESSION['session_id'] = $row['login_id'];
            $_SESSION['session_fname'] = $row['fname'];
            $_SESSION['session_lname'] = $row['lname'];
            $_SESSION['session_status'] = $row['status'];


            header('location:admin.php');
        }
    } else {
        return FALSE;
    }


    // books functionalities
}
function add_genre($genre)
{ // add a new genre
    $sql = "INSERT INTO genre(genre)VALUES('$genre')";
    $result = db_connect()->query($sql);
    header('location:add_genre.php');
}
function get_genre()
{ // sql to get deparmtents table data
    $sql = "SELECT * FROM genre";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}

function add_book($bookName, $book_code, $book_desc, $book_genre, $book_count)
{ //sql to add a new book
    $new_book_desc = db_connect()->real_escape_string($book_desc);
    $sql = "INSERT INTO books(book_name,book_code,book_desc,book_genre,book_count)VALUES('$bookName','$book_code','$new_book_desc','$book_genre',$book_count)";
    $result = db_connect()->query($sql);
    echo "<script>window.location.href = 'admin.php'</script>";
}


function dynamic_delete($table_name, $id_column, $id, $header_location)
{
    $sql = "DELETE FROM $table_name WHERE $id_column = '$id'";
    $result = db_connect()->query($sql);
    header("location:$header_location");
}

function dynamic_select($table_name)
{
    $sql = "SELECT * FROM $table_name";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}
function dynamic_book_count($keyword)
{
    $sql = "SELECT * FROM books WHERE book_genre = '$keyword'";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        return $result->num_rows;
    } else {
        return 0;
    }
}

function dynamic_upload($table_name,$img_col,$filename, $pk_col, $id){
    $conn = db_connect();
    $sql = "UPDATE $table_name SET $img_col = '$filename' WHERE $pk_col = '$id'";
    $result = $conn->query($sql);
    if($result == TRUE){
        return 1;
    }else{  
        return 0;
    }

}

function get_specific_books($keyword)
{
    $sql = "SELECT * FROM books WHERE book_genre = '$keyword'";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}
function get_specific_book_count($id)
{
    $sql = "SELECT * FROM books WHERE book_id = '$id'";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['book_count'];
    } else {
        return 0;
    }
}
function get_specific_book_detail($id)
{
    $sql = "SELECT * FROM books WHERE book_id = '$id'";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return 0;
    }
}

function reserve_book($book_id, $student_id)
{
    $current_date = date("Y/m/d");
    $conn = db_connect();
    $sql = "INSERT INTO borrowed_books(student_id,book_id,date_borrowed)VALUES('$student_id','$book_id','$current_date')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>Book reserved successfully</strong> 
        </div>';
    } else {
        die('ERROR ' . $conn->error);
    }
}
function get_specific_reserved_book($id, $status)
{
    $conn = db_connect();
    $sql = "SELECT * FROM borrowed_books WHERE book_id = '$id' AND status ='$status'";
    return $result = $conn->query($sql)->num_rows;
}
function get_student_reserved_books($id)
{
    $sql = "SELECT * FROM borrowed_books INNER JOIN books ON borrowed_books.book_id = books.book_id WHERE borrowed_books.student_id = '$id' AND borrowed_books.status='borrowed'";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}

function count_borrowed_table_data($status)
{
    $sql = "SELECT * FROM borrowed_books WHERE status = '$status'";
    $result = db_connect()->query($sql);

    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}

function get_all_borrowed_books()
{
    $sql = "SELECT * FROM borrowed_books 
            INNER JOIN books ON borrowed_books.book_id = books.book_id
            INNER JOIN students ON borrowed_books.student_id = students.student_id WHERE status = 'borrowed'";
    $result = db_connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}
function get_borrowers_name(){
    $sql = "SELECT * FROM borrowed_books 
    INNER JOIN books ON borrowed_books.book_id = books.book_id
    INNER JOIN students ON borrowed_books.student_id = students.student_id  WHERE status = 'borrowed' GROUP BY borrowed_books.student_id";
    $result = db_connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = array();
        while ($rows = $result->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else {
        return FALSE;
    }
}
function update_borrow_status($borrow_id){
    $sql = "UPDATE borrowed_books SET status='RETURNED' WHERE borrow_id = '$borrow_id'";
    $result = db_connect()->query($sql);
    if($result == TRUE){
        echo "<script>window.location.href = 'borrowed_books.php'</script>";
    }else{
        echo "ERROR";
    }


}
function get_book_date_only($id){
    $conn = db_connect();
    $sql = "SELECT DATE_FORMAT(date_borrowed,'%d') AS day FROM borrowed_books WHERE borrow_id = '$id'";
    $result = db_connect()->query($sql);
    if($result == TRUE){
        return $result->fetch_assoc();
    }else{
        echo "ERROR";
    }
}
// function get_penalty_pay($borrow_id){
//  $date = get_book_date_only($borrow_id);
//  $dayFromDb = intval($date['day']);

//   $current_date = date("d");
//   $validate_penalty =  $current_date - $dayFromDb;
//   $penalty = 5;
//   return $penaltyPay = ($validate_penalty - 2) * $penalty;
// }

function count_student_currently_borrowed_books($id){
    $sql = "SELECT * FROM BORROWED_BOOKS WHERE student_id = '$id' AND status='BORROWED'";
    $result = db_connect()->query($sql);
    if($result->num_rows >= 2){
        return 1;
    }else{
        return 0;
    }



}
