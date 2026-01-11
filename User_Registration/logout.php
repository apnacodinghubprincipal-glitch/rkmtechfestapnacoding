<?php
session_start();
session_unset();
session_destroy();
header("Location:/RKM Tech Fest 2026/User_Registration/index.php");
?>