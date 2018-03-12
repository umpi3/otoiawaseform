<!-- 検索したいワードを入力したらその文字が含まれてるコンテンツのデータが表示される -->

<?php

	//POST送信が行われたらDB接続してデータ取得
if(isset($_POST) && !empty($_POST['word'])){
	// １．データベースに接続する
	$dsn = 'mysql:dbname=otoiawaseform;host=localhost' ;
	$user = 'root' ;
	$password = '' ;
	$dbh = new PDO( $dsn , $user , $password );
	$dbh -> query ( 'SET NAMES utf8' );
	// ２．SQL文を実行する
	// $likeWord = %$_POST['word']%
	$sql = 'SELECT*FROM `survey` WHERE `content` LIKE'."'%".$_POST['word']."%'";
	// SQLを実行
	$stmt = $dbh -> prepare ( $sql );
	$stmt -> execute ();
//データ取得
	// $rec = $stmt->fetch(PDO::FETCH_ASSOC);
	$survey_line = array();
while(1){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);//1回フェッチ
  //取得できるデータがなくなったら終了
  if($rec == false){
  	break;
  };
$survey_line[]=$rec;
};
	// ３．データベースを切断する
	$dbh = null ;
};
?>



<!DOCTYPE html>
<html lang="ja" >
<head>
  <title>検索ページ</title >
  <meta charset="utf-8">
</head>
<body>
  <form action="" method="post">
	<p>検索したいidを入力してください。</p>
	<input type="text" name="word">
	<input type="submit" value="検索">
  </form>

  <!-- $recは検索欠けてから定義されるからエラー回避 -->
  <!-- <?php if(isset($rec)){ ?>
  <br>
  	<?php echo $rec["id"]; ?><br>
		<?php echo $rec["nick"]; ?><br>
		<?php echo $rec["email"]; ?><br>
		<?php echo $rec["content"]; ?><br>
		<?php echo $rec["created"]; ?><br>
	<?php }?> -->
<?php if(isset($survey_line)){ ?>
<?php foreach($survey_line as $one_otoiawase): ?>
<?php echo $one_otoiawase["id"]; ?><br>
<?php echo $one_otoiawase["nick"]; ?><br>
<?php echo $one_otoiawase["email"]; ?><br>
<?php echo $one_otoiawase["content"]; ?><br>
<?php echo $one_otoiawase["created"]; ?><br>
<?php endforeach ?>
<?php }?>
</body>
</html>