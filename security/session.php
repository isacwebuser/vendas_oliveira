<?php

session_start();

//Depois de verificar login/senha, reinicie a sessão.
session_destroy();
session_start();
session_regenerate_id();

echo session_id();