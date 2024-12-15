<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Tags.php';

$id = $_GET["id"];
$tags = new Tags();
if (isset($id)) {
    $tags = $tags->delete($id);
    if ($tags) {
        echo
        '<script>;
        window.location.href = "../views/index-tags.php";</script>';
    }
}
