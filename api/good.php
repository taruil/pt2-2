<?php include_once "../base.php";

switch($_POST['type']){
    case "1":
        $Log->save([
'acc'=>$_POST['acc'],
'news'=>$_POST['news'],

        ]);
        $news=$News->find($_POST['news']);
        $news['good']++;
        $News->save($news);
    break;
    case "2":
        $Log->del([
            'acc'=>$_POST['acc'],
            'news'=>$_POST['news'],
        ]);
        $news=$News->find($_POST['news']);
        $news['good']--;
        $News->save($news);
    break;


}

?>