<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

if (!$_SESSION["name"]) {
    header("Location: login.php");
}

$user = new Users();
$user->logout();

echo "<script>
            window.location.href = 'login.php';
            </script>";
