<?php
    include_once "../base.php";

    save("news",$_POST);

    to("../admin.php?do=news");
?>