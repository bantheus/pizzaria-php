<?php

    $host = 'db';
    $user = 'root';
    $pass = 'MYSQL_ROOT_PASSWORD';
    $database = 'MYSQL_DATABASE';

    $conn = new mysqli($host, $user, $pass, $database);

?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include('components/header.php'); ?>

<?php include('components/footer.php'); ?>

</html>
