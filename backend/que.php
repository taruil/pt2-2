<fieldset>
<legend>新增問卷</legend>
<form action="api/addque.php" method="post">
<table>
    <tr>
        <td>問卷名稱:<input type="text" name="subject" id=""></td>
    </tr>
    <tr id="more">
        <td>選項:<input type="text" name="option[]" id=""><input type="button" value="更多" onclick="more()"></td>
    </tr>
    <tr>
        <td><input type="submit" value="新增">|<input type="reset" value="清空"></td>
    </tr>
    
</table>
</form>
</fieldset>
<script>
function more(){
    let option=
    `<tr>
        <td>選項:<input type="text" name="option[]" id=""></td>
    </tr>`
    $("#more").before(option)
}
</script>