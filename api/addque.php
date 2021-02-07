<?php
include_once "../base.php";
$subject=$_POST['subject'];
$Que->save(['text'=>$subject,'subject'=>0,'count'=>0]);
$main=$Que->find(['text'=>$subject]);

foreach($_POST['option'] as $option){
    $Que->save(['text'=>$subject,'subject'=>$main['id'],'count'=>0]);
}
to("../backend.php?do=que");
?>