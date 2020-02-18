<?php
    $title=find("que",$_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$title['text'];?></legend>
    <form action="./api/vote.php" method="post">
        <h3><?=$title['text'];?></h3>
        <?php
            $text=all("que",['parent'=>$title['id']]);
            foreach($text as $t){
                echo "<input type='radio' name='vote' value='".$t['id']."'>".$t['text']."<br>";
            }
        ?>
        <input type="submit" value="我要投票">
    </form>
</fieldset>