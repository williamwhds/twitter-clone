<?php
session_start();
session_destroy();
header("Location: ../index.php?msg1=Sessão Encerrada&msg2=Sua sessão foi encerrada com sucesso.");
?>
