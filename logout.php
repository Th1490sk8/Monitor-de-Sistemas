<?php
session_start();
session_unset();    // Remove as variáveis da sessão
session_destroy();  // Destrói a sessão completamente

// Redireciona para o login
header("Location: login.php");
exit();
?>