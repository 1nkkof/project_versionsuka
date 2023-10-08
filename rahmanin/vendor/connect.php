
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connect = mysqli_connect('localhost','root','','BookTreeBD');
    if(!$connect){
        die('Error connect to DataBase'.mysqli_connect_error());
    }

return $connect;
?>