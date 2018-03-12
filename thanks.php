<?php
// フォームからPOST送信で受け取った情報をサニタイズし変数へ代入
$nick = htmlspecialchars($_POST['nick']);
$email = htmlspecialchars($_POST['email']);
$content = htmlspecialchars($_POST['content']);
// １．データベースに接続する
$dsn = 'mysql:dbname=otoiawaseform;host=localhost';
//mysqlを使うことを宣言、データベース名を指定、hostはthnaks.phpから見たサーバーの名前だから今回はmysqlは同じパソコン内にあるのでlohost。スペース入れるとエラーになるから注意
$user = 'root';//mysqlのやつ
$password='';//xamppの初期のパスワード
$dbh = new PDO($dsn, $user, $password);
$dbh -> query ( 'SET NAMES utf8' );//接続している間の文字コードの設定
// ２．SQL文を実行する
$sql = "INSERT INTO `survey` (`nick`, `email`, `content`, `created`) VALUES (?, ?, ?, now());" ;
//sqlを実行する宣言
//プリペアードステートメント
$data = array($nick, $email, $content);
$stmt = $dbh -> prepare ( $sql );
$stmt -> execute ($data);
// ３．データベースを切断する
$dbh = null ;


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>送信完了</title>
</head>
<body>
<h1>お問い合わせありがとうございました！</h1>
<div>
<h3>お問い合わせ詳細内容</h3>
<p>ニックネーム：<?php echo $nick; ?> </p>
<p>メールアドレス： <?php echo $email; ?> </p>
<p>お問い合わせ内容： <?php echo $content; ?> </p>
</div>
</body>
</html>