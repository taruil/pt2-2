<?php
$id=$_GET['id'];
$subject=$Que->find($id);
$options=$Que->all(['subject'=>$id]);
?>
<fieldset>
<legend>目前位置：首頁＞問卷調查</legend>
<form action="api/vote.php" method="post">
<table>
    <?php
        foreach($options as $option){
            ?>
            <tr>
                <td>
                    <input type="radio" name="vote" value="<?=$option['id'];?>"><?=$option['text'];?>
                </td>
            </tr>
        <?php
        }
?>
</table>
<input type="hidden" name="subject" value="<?=$option['id'];?>">
<div class="ct"><input type="submit" value="我要投票"></div>
</form>
</fieldset>