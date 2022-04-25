<?php

    include('../database/db_connect.php');

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //success
            header('Location: ../index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    //check GET request id param
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //make sql
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        //get the query result
        $result = mysqli_query($conn, $sql);

        //fetch result in array format
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <?php include('../components/header.php'); ?>

    <div class="container center">
        <?php if($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['titulo']); ?></h4>
            <p>Criado por: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo date($pizza['criado_em']); ?></p>
            <h5>Ingredientes:</h5>
            <p><?php echo htmlspecialchars($pizza['ingredientes']); ?></p>

            <!--- DELETE FORM --->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
                <input class="btn brand z-depth-0" type="submit" name="delete" value="DELETE">
            </form>

        <?php else: ?>
            <h5>Pizza não encontrada!</h5>
        <?php endif; ?>
    </div>

    <?php include('../components/footer.php'); ?>

</html>
