<?php
session_start();
?>

<!DOCTYPE html>
<html>
<header>
    <title>Login</title>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id"
          content="837199914199-n34uegop1v4fhg4oahlutggpfme85mbo.apps.googleusercontent.com">
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
    if (isset($_SESSION['nao_autenticado'])):
        ?>
        <div class="alert-danger">
            <p>ERRO: Informações enviadas inválidas.</p>
        </div>
        <?php
        unset($_SESSION['nao_autenticado']);
    endif;
    ?>
    <form action="Autenticacao/login.php" method="POST">
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <p id="msg"></p>
        <script>
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                var idUserGoogle = profile.getId(); // Do not send to your backend! Use an ID token instead.
                var nameGoogle = profile.getName();
                var imageGoogle = profile.getImageUrl();
                var emailGoogle = profile.getEmail(); // This is null if the 'email' scope is not present.
                var tokenGoogle = googleUser.getAuthResponse().id_token;
            }
        </script>
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