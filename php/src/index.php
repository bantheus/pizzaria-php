<?php

    $host = 'db';
    $user = 'root';
    $pass = 'MYSQL_ROOT_PASSWORD';
    $database = 'MYSQL_DATABASE';

    $conn = mysqli_connect($host, $user, $pass, $database);

    if(!$conn){
        echo 'Connection error:' . mysqli_connect_error();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include('components/header.php'); ?>

<?php include('components/footer.php'); ?>

</html>
