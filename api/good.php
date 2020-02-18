<?php
    include_once "../base.php";

    $type=$_POST['type'];
    $id=$_POST['id'];
    $user=$_POST['user'];

    $news=find("news",$id);

    if($type==1){
        $log['news']=$id;
        $log['user']=$user;
        save("log",$log);
        $news['good']++;
    }else{
        del("log",['news'=>$id,'user'=>$user]);
        $news['good']--;
    }
    save("news",$news);
    // to("../index.php?do=news");
?>