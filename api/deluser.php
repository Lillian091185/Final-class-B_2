<?php
include_once "../base.php";

if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
        if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
            del("user", $id);
        }
    }
}

to("../admin.php?do=admin");

?>
