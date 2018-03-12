<?php
// １．データベースに接続する
$dsn = 'mysql:dbname=otoiawaseform;host=localhost' ;
$user = 'root' ;
$password = '' ;
$dbh = new PDO( $dsn , $user , $password );
$dbh -> query ( 'SET NAMES utf8' );
// ２．SQL文を実行する
$sql = 'SELECT*FROM `survey` ORDER BY `created` DESC' ;
$stmt = $dbh -> prepare ( $sql );
$stmt -> execute ();

//データ取得
$survey_line = array();
while(1){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);//1回フェッチ
  //取得できるデータがなくなったら終了
  if($rec == false){
  	break;
  }
$survey_line[]=$rec;
// var_dump($rec);
}
// $rec = $stmt->fetch(PDO::FETCH_ASSOC);//1回フェッチ
// $survey[]=$rec;
// var_dump($rec);
// ３．データベースを切断する
$dbh = null;
?>

<pre>
<?php
	// var_dump($survey_line);
foreach($survey_line as $one_otoiawase):
?>
<?php echo $one_otoiawase["id"]; ?><br>
<?php echo $one_otoiawase["nick"]; ?><br>
<?php echo $one_otoiawase["email"]; ?><br>
<?php echo $one_otoiawase["content"]; ?><br>
<?php echo $one_otoiawase["created"]; ?><br>

<?php endforeach ?>
</pre>