<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Kategori.php';

$id = $_GET["id"];
$category = new Kategori();
if (isset($id)) {
    $category = $category->delete($id);
    if ($category) {
        echo
        '<script>;
        window.location.href = "../views/index-kategori.php";</script>';
    }
}
