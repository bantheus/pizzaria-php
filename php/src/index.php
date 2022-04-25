<?php

    include('./database/db_connect.php');

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

    explode(',', $pizzas[0]['ingredientes']);

?>
<!DOCTYPE html>
<html lang="pt-br">

    <?php include('components/header.php'); ?>

    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">

            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['titulo']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredientes']) as $ingrediente): ?>
                                    <li><?php echo htmlspecialchars($ingrediente); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="./pages/details.php?id=<?php echo $pizza['id']?>">informações</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <?php include('components/footer.php'); ?>

</html>
