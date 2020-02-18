<?php
    include_once "../base.php";

    $sub['text']=$_POST['title'];
    $sub['parent']=0; 
    save("que",$sub);

    $parent=q("select max(`id`) from `que`")[0][0];
    foreach($_POST['opt'] as $opt){
        $o['text']=$opt;
        $o['parent']=$parent;
        save("que",$o);
    }
    
    to("../admin.php?do=que");
?>