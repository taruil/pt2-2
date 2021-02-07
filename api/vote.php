<?php include_once "../base.php";

$subject=$Que->find($_POST['subject']);
$subject['count']++;
$Que->save($subject);

$option=$Que->find($_POST['vote']);
$option['count']++;
$Que->save($option);

to("../index.php?do=result&id={$subject['id']}");
?>