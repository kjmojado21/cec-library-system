<?php 
session_start();
function db_connect(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'cec_library';

    // $servername = 'us-cdbr-east-04.cleardb.com';
    // $username = 'b3bb34dc13739a';
    // $password = '38b4c9b1';
    // $db_name = 'heroku_f4158b84ee17832';

    return $conn = new mysqli($servername,$username,$password,$db_name);
}
?>