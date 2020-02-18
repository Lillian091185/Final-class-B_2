<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td style="width:30%">標題</td>
            <td style="width:50%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $total = nums("news", ['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $p = (!empty($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($p - 1) * $div;
        $row = all("news", ['sh' => 1], " limit $start,$div");
        foreach ($row as $r) {
        ?>
            <tr>
                <td class="clo title" style="cursor:pointer;color:blue;"><?= $r['title']; ?></td>
                <td>
                    <div class="part"><?= mb_substr($r['text'], 0, 25, "utf8"); ?>...</div>
                    <div class="all" style="display:none"><?= nl2br($r['text']); ?></div>
                </td>
                <td>
                    <span id="vie<?= $r['id']; ?>"><?= $r['good']; ?></span>個人說讚
                    <?php
                    if (!empty($_SESSION['user'])) {
                        $chk = nums("log", ['news' => $r['id'], 'user' => $_SESSION['user']]);
                        if ($chk > 0) {
                    ?>
                            <a id=good<?= $r['id']; ?> onclick="good('<?= $r['id']; ?>','2','<?= $_SESSION['user']; ?>')">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a id=good<?= $r['id']; ?> onclick="good('<?= $r['id']; ?>','1','<?= $_SESSION['user']; ?>')">讚</a>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if (($p - 1) > 0) {
            echo "<a href='index.php?do=news&p=" . ($p - 1) . "' style='text-decoration:none'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $fontSize = ($i == $p) ? "24px" : "16px";
            echo "<a href='index.php?do=news&p=$i' style='font-size:$fontSize;text-decoration:none'> " . $i . " </a>";
        }
        if (($p + 1) <= $pages) {
            echo "<a href='index.php?do=news&p=" . ($p + 1) . "' style='text-decoration:none'> > </a>";
        }
        ?>
    </div>

</fieldset>

<script>
    $(".title").on("click", function() {
        $(this).next("td").children(".part, .all").toggle()
    })
</script>