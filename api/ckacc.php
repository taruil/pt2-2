<?php include_once "../base.php";

$acc=$_POST['acc'];
$ck=$Mem->count(['acc'=>$acc]);

if($ck){
  echo 1;
}else{
  echo 0;
}


?>