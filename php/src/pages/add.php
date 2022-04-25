<?php

    include('../database/db_connect.php');

    $title = $email = $ingredientes = '';
    $errors = array('email' => '', 'title' => '', 'ingredients' => '');

    if (isset($_POST['submit'])) {
        //check email
        if (empty($_POST['email'])) {
            $errors['email'] = 'O campo email é obrigatório <br>';
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email inválido <br>';
            }
        }
        //check titulo
        if (empty($_POST['title'])) {
            $errors['title'] = 'O campo título é obrigatório <br>';
        } else {
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title'] = 'Título inválido <br>';
            }
        }
        //check ingredientes
        if (empty($_POST['ingredients'])) {
            $errors['ingredients'] = 'Os ingredientes são obrigatórios <br>';
        } else {
            $ingredientes = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-z-A-Z\s]*)*$/', $ingredientes)) {
                $errors['ingredients'] = 'Os ingredientes são inválidos <br>';
            }
        }

        if (array_filter($errors)) {
            //echo 'Erros no formulário';
        } else {
            //echo 'Formulário validado';
            header('Location: ../index.php');
        }

    } //end if submit

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include('./../components/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Adicionar Pizza</h4>
    <form class="white" action="add.php" method="POST">
        <label for="email">Email:</label>
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <input type="text" name="email" value="<?php echo  htmlspecialchars($email); ?>">

        <label for="title">Nome da Pizza:</label>
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">

        <label for="ingredients">Ingredientes:</label>
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredientes); ?>">

        <div class="center">
            <input class="btn brand z-depth-0" type="submit" name="submit" value="Enviar">
        </div>
    </form>
</section>

<?php include('./../components/footer.php'); ?>

</html>