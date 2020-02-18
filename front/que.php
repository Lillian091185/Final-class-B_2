<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table width="100%" class="ct">
        <tr>
            <td width="10%">編號</td>
            <td>問卷題目</td>
            <td width="15%">投票總數</td>
            <td width="10%">結果</td>
            <td width="15%">狀態</td>
        </tr>
        <?php
        $row = all("que", ['parent' => 0,'sh'=>1]);
        foreach ($row as $k => $r) {
        ?>
            <tr>
                <td><?= ($k + 1); ?>.</td>
                <td><?= $r['text']; ?></td>
                <td><?= $r['count']; ?></td>
                <td>
                    <a href="index.php?do=result&id=<?=$r['id'];?>">結果</a>
                </td>
                <td>
                    <?php
                    if (empty($_SESSION['user'])) {
                        echo "請先登入";
                    } else {
                    ?>
                        <a href="index.php?do=vote&id=<?=$r['id'];?>">參與投票</a>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
</fieldset>