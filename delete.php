<?php
include 'functions/functions.php'; 
if(isset($_GET['genre_id'])){
    dynamic_delete('genre','genre_id',$_GET['genre_id'],'add_genre.php');
}elseif(isset($_GET['book_id'])){
    dynamic_delete('books','book_id',$_GET['book_id'],'admin.php');
}


?>