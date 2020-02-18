<style>
    .text{
        width:40%;
        vertical-align:middle;
        display:inline-block;
    }
    .line{
        height:25px;
        background: #ccc;
        display:inline-block;
    }
    .result{
        width:10%;
        height:25px;
        display:inline-block;
    }
</style>
<?php
    $title=find("que",$_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$title['text'];?></legend>
    <h3><?=$title['text'];?></h3>
    <?php
        $row=all("que",['parent'=>$title['id']]);
        foreach($row as $k => $r){
            $total=($title['count']==0)?1:$title['count'];
            $rate=round(($r['count']/$total)*100);
            echo "<div>";
            echo "<div class='text'>".($k+1).".";
            echo $r['text']."</div>";
            echo "<div class='line' style='width:".(48*$rate/100)."%'></div>";
            echo "<div class='result'>".$r['count']."票($rate%)</div>";
            echo "</div>";
        }
    ?>
    <button onclick="javascript:location.href='index.php?do=que'">返回</button>
</fieldset>