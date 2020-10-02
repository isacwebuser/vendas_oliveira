<?php
session_start();
?>
<!DOCTYPE html>
<html>
<header>
    <title>Login</title>
    <link rel="stylesheet" href="View/css/bootstrap.css">
    <script src="View/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="View/css/bootstrap-grid.css">
    <script src="View/css/bootstrap-grid.css"></script>
    <link rel="stylesheet" href="View/css/bootstrap-reboot.css">
    <script src="View/css/bootstrap-reboot.css"></script>
    <link rel="stylesheet" type="text/css" href="View/css/style.css">
</header>
<body>
<div class="wrapper fadeInDown">
    <?php
    if (isset($_SESSION['nao_autenticado'])):
        ?>
        <div class="alert-danger">
            <p>ERRO: Informações enviadas inválidas.</p>
        </div>
        <?php
        unset($_SESSION['nao_autenticado']);
    endif;
    ?>
    <div id="formContent">
        <!-- Tabs Titles -->
        <!-- Icon -->
        <div class="fadeIn first"
        <img src="View/pictures/indiano.svg" id="icon" alt="User Icon"/>
    </div>
    <!-- Login Form -->
    <form action="Autenticacao/login.php" method="POST">
        <input type="text" id="login" class="fadeIn second" name="desLogin" placeholder="login">
        <input type="text" id="password" class="fadeIn third" name="desPass" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

</div>
</div>
</body>
</html>