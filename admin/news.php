<input type="button" value="新增文章" onclick="javascript:location.href='admin.php?do=addnews'">
<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/news.php" method="post">
        <table style="width:80%;margin:auto">
            <tr>
                <td width="10%">編號</td>
                <td>內容</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            $total = nums("news");
            $div = 3;
            $pages = ceil($total / $div);
            $p = (!empty($_GET['p'])) ? $_GET['p'] : 1;
            $start = ($p - 1) * $div;
            $row = all("news", [], " limit $start,$div");
            foreach ($row as $k => $r) {
            ?>
                <tr>
                    <td><?= ($k + 1 + $start); ?>.</td>
                    <td><?= $r['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $r['id']; ?>" <?=($r['sh']==1)?"checked":"";?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $r['id']; ?>"></td>
                    <td><input type="hidden" name="id[]" value="<?= $r['id']; ?>"></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            if (($p - 1) > 0) {
                echo "<a href='admin.php?do=news&p=" . ($p - 1) . "' style='text-decoration:none'> < </a>";
            }
    
            for ($i = 1; $i <= $pages; $i++) {
                $fontSize = ($i == $p) ? "24px" : "16px";
                echo "<a href='admin.php?do=news&p=$i' style='font-size:$fontSize;text-decoration:none'> " . $i . " </a>";
            }
            if (($p + 1) <= $pages) {
                echo "<a href='admin.php?do=news&p=" . ($p + 1) . "' style='text-decoration:none'> > </a>";
            }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>

</fieldset>