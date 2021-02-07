  <fieldset style="width:50%;margin:20px auto">
    <legend>忘記密碼</legend>
    <table>
      <tr>
        <td>請輸入信箱以查詢密碼</td>
      </tr>
      <tr>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
        <td><span id="result"></span></td>
      </tr>
      <tr>
        <td><button onclick="findPw()">尋找</button></td>
      </tr>
    </table>
  </fieldset>
  <script>
    function findPw(){
      let email=$("#email").val()
      $.post("api/forget.php",{email},function(res){
        $("#result").html(res)
      })
    }
  </script>