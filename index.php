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
<div class="bloco_login">
    <?php
        if(isset($_SESSION['nao_autenticado'])):
    ?>
    <div class="alert-danger">
        <p>ERRO: Informações  enviadas inválidas.</p>
    </div>
    <?php
        unset($_SESSION['nao_autenticado']);
        endif;
    ?>
    <form action="Autenticacao/login.php" method="POST">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="desLogin">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="desPass">
        </div>
        <button type="submit" class="btn btn-dark">Enviar</button>
    </form>
</div>
</body>
</html>