<?php
    include_once "../base.php";

    $email=$_POST['email'];
    
    $chk=nums("user",['email'=>$email]);
    
    if($chk>=1){
        $res=find("user",['email'=>$email]);
        echo "您的密碼為：".$res['pw'];
    }else{
        echo "查無此信箱";
    }
?>