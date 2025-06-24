<?php
session_start();
session_unset();
session_destroy();
header("Location: super_login.php");
exit();
?>