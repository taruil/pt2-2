<?php
include_once "../base.php";

foreach($_POST['id'] as $id){
  if(isset($_POST['del']) && in_array($id,$_POST['del'])){
    $News->del($id);
  }else{
    $news=$News->find($id);
    $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']));
    $News->save($news);
  }
}
to("../backend.php?do=news");
?>