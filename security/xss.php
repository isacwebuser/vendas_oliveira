<html>
   <head>Começo</head>
   <body>
        <form method="post">
            <input type="text" name="busca">
            <button type="submit">Enviar</button>
        </form>
   </body>
</html>
<?php

if(isset($_POST["busca"])){
    //impedir injeção de scripts com tag
    echo htmlentities($_POST["busca"]);
}
