<?php include_once "../base.php";

$email=$_POST['email'];
$row=$Mem->find(['email'=>$email]);


if(!empty($row)){
  echo "您的密碼為:".$row['pw'];
}else{
  echo "查無資料";
}

?>