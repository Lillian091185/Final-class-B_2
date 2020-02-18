<fieldset>
    <legend>問卷列表</legend>
    <table class="ct">
        <tr class="ct clo">
            <td>問卷名稱</td>
            <td>投票數</td>
            <td>開放</td>
        </tr>
        <?php
        $row = all("que", ['parent' => 0]);
        foreach ($row as $k => $r) {
        ?>
            <tr>
                <td width="70%"><?= ($k + 1); ?>.<?= $r['text']; ?></td>
                <td class="ct"><?= $r['count']; ?></td>
                <td class="ct"><button class="btn" data-show="<?=$r['id'];?>"><?= ($r['sh'] == 1) ? "開放" : "關閉"; ?></button></td>
            </tr>
        <?php
        }
        ?>

    </table>
</fieldset>
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/addque.php" method="post">
        <table>
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td colspan="2" id="arow">
                    選項<input type="text" name="opt[]">
                    <input type="button" value="更多" id="moreOpt">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="新增"> | <input type="reset" value="清空">
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
    $("#moreOpt").on("click", function() {
        let str = `選項<input type="text" name="opt[]"><br>`
        $("#arow").prepend(str)
    })
    
    $(".btn").on('click',function(){
        let id=$(this).data('show')
        $.post("./api/show.php",{id},function(res){
            location.reload()
        })
    })
</script>