<?php

    $host = 'db';
    $user = 'root';
    $pass = 'MYSQL_ROOT_PASSWORD';
    $database = 'MYSQL_DATABASE';

    //conexão com o banco
    $conn = mysqli_connect($host, $user, $pass, $database);

    //verifica se a conexão foi bem sucedida
    if (!$conn) {
        echo 'Connection error:'.mysqli_connect_error();
    }

    //query para selecionar os registros da tabela
    $sql = 'SELECT titulo, ingredientes, id FROM pizzas ORDER BY criado_em';

    //executa a query
    $result = mysqli_query($conn, $sql);

    //fetch para criar um array com os registros
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // limpa $result da memória
    mysqli_free_result($result);

    //fecha a conexão
    mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="pt-br">

    <?php include('components/header.php'); ?>

    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">

            <?php foreach($pizzas as $pizza){ ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['titulo']); ?></h6>
                            <div><?php echo htmlspecialchars($pizza['ingredientes']) ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="#">informações</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <?php include('components/footer.php'); ?>

</html>
