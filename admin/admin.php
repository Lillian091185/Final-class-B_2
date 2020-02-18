<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/deluser.php" method="post">
        <table class="ct" style="width:70%;margin:auto">
            <tr class="clo">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $row = all("user");
            foreach ($row as $r) {
                if ($r['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $r['acc']; ?></td>
                        <td><?= str_repeat("*", strlen($r['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $r['id']; ?>"></td>
                        <td><input type="hidden" name="id[]" value="<?= $r['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
            <tr>
                <td colspan="3">
                    <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
                </td>
            </tr>
        </table>
    </form>

    <h2>新增會員</h2>
    <table style="width:100%">
        <tr>
            <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
        <tr>
            <td style="width:30%">帳號：</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="width:30%">密碼：</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td style="width:30%">確認密碼：</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td style="width:30%">信箱：</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" id="reg"><input type="reset" value="清除">
            </td>
        </tr>
    </table>
</fieldset>
<script>
      $("input[type='reset']").on("click",function(){
        $("#acc,#pw,#pw2,#email").val("")
      })

      $("#reg").on("click",function(){
          let acc=$("#acc").val()
          let pw=$("#pw").val()
          let pw2=$("#pw2").val()
          let email=$("#email").val()
          if(acc=="" || pw=="" || pw2=="" || email==""){
            alert("不可空白")
            $("#acc,#pw,#pw2,#email").val("")
          }else{
            $.post("./api/chkacc.php",{acc},function(status){
                if(status==='1'){
                    alert("帳號重複")
                    $("#acc,#pw,#pw2,#email").val("")
                }else{
                    if(pw==pw2){
                        $.post("./api/reg.php",{acc,pw,email},function(res){
                            location.reload()
                        })
                    }else{
                        alert("密碼錯誤")
                        $("#acc,#pw,#pw2,#email").val("")
                    }
                }
            })
          }
      })
</script>