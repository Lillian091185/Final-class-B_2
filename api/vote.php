<?php
    include_once "../base.php";

    $row=find("que",$_POST['vote']);
    $row['count']++;
    save("que",$row);

    $sub=find("que",['id'=>$row['parent']]);
    $sub['count']++;
    save("que",$sub);

    to("../index.php?do=result&id=".$sub['id']."");
?>