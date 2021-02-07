<?php
$id=$_GET['id'];
$subject=$Que->find($id);
$options=$Que->all(['subject'=>$id]);

?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <form action="api/vote.php" method="post">
        <table>
            <?php
                foreach($options as $key => $option){
                $div=($subject['count']!=0)?$subject['count']:1;
                $rate=$option['count']/$div;
            ?>
            <tr>
                <td width="50%">
                    <?=$key+1;?>.
                    <?=$option['text'];?>
                </td>
                <td>
                    <div style="display:inline-block;height:25px;background:#999;width:<?=100*$rate;?>%"></div>
                    <?=$option['count'];?>票(<?=round(($rate)*100);?>%)
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
                <input type="hidden" name="subject" value="<?=$subject['id'];?>">
        <div class="ct"><a href="index.php?do=que"><button type="button">返回</button></a></div>
    </form>
</fieldset>