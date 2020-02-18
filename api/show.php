<?php

    include_once "../base.php";

    $id=$_POST['id'];
    $row=find("que",$id);

    $row['sh']=($row['sh']+1)%2;

    save("que",$row);
?>