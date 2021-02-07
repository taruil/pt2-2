<form action="">
  <fieldset style="width:50%;margin:20px auto">
    <legend>會員註冊</legend>
    <div style="color:red">請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
      <tr>
        <td>帳號:</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td>密碼:</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td>確認密碼:</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
      <tr>
        <td>信箱:</td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
        <td><input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除"></td>
      </tr>
    </table>
  </fieldset>
</form>
<script>
  function reg(){

    let acc=$("#acc").val()
    let pw=$("#pw").val()
    let pw2=$("#pw2").val()
    let email=$("#email").val()

    if(acc==""|| pw=="" || pw2=="" || email=="") {
      alert ("不可空白")
    }else if(pw!=pw2){
      alert ("密碼錯誤")
    }else{
      $.post("api/ckacc.php",{acc},function(res){
        if(res=='1'){
          alert ("帳號重複")
        }else{
          $.post("api/reg.php",{acc,pw,email},function(){
            alert ("註冊完成，歡迎加入")
          })
        }
      })
    }
  }

</script>