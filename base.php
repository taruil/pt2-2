<?php
date_default_timezone_set("Asia/Taipei");
session_start();

$Total=new DB('total');
$Mem=new DB('mem');
$News=new DB('news');
$Log=new DB('log');
$Que=new DB('que');

$tt=[
  1=>"健康新知",
  2=>"菸害防治",
  3=>"癌症防治",
  4=>"慢性病防治",
];

$ck=$Total->find(['date'=>date("Y-m-d")]);

if(empty($ck) && empty($_SESSION['total'])){
  $Total->save(["date"=>date("Y-m-d"),"total"=>1]);
  $_SESSION['total']=1;
}else if(empty($ck) && !empty($_SESSION['total'])){
  $Total->save(["date"=>date("Y-m-d"),"total"=>1]);
}else if(!empty($ck) && empty($_SESSION['total'])){
  $ck['total']++;
  $Total->save($ck);
  $_SESSION['total']=1;
}

class DB{
  protected $table="";
  protected $dsn="mysql:host=localhost;dbname=db72;charset=utf8";
  protected $pdo="";

  function __construct($talbe){
    $this->table=$talbe;
    $this->pdo=new PDO($this->dsn,"root","");
  }

  function all(...$arg){
    $sql="select * from $this->table";

    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key=>$value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .= " where ".implode(" && ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if(isset($arg[1])){
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }

  function count(...$arg){
    $sql="select count(*) from $this->table";

    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key=>$value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .= " where ".implode(" && ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if(isset($arg[1])){
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }

  function find($id){
    $sql="select * from $this->table";

    if(is_array($id)){
      foreach($id as $key=>$value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql .= " where ".implode(" && ",$tmp);
    }else{
      $sql .=" where `id`='{$id}' ";
      // echo $sql;
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  function del($id){
    $sql=" delete from $this->table";

    if(is_array($id)){
      foreach($id as $key=>$value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql .= " where ".implode(" && ",$tmp);
    }else{ 
      $sql .=" where `id`='{$id}' ";
    }
    return $this->pdo->exec($sql);
  }

  function save($arg){
    if(isset($arg['id'])){
      foreach($arg as $key=>$value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql="update $this->table set ".implode(",",$tmp)." where `id`='{$arg['id']}'";
    }else{
      $sql="insert into $this->table (`".implode("`,`",array_keys($arg))."`) values('".implode("','",$arg)."')";
    }
    return $this->pdo->exec($sql);
  }
  
  function q($sql){
    return $this->pdo->query($sql)->fetchAll();
  }

}

function to($url){
  header("location:".$url);
}
?>