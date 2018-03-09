<!DOCTYPE html>
<html lang="ja">
<head>
<title>入力内容確認</title>
<meta charset="utf-8">
</head>
<body>
<h1>入力内容確認</h1>
<?php
$nickname = $_POST [ 'nickname' ];
$email = $_POST [ 'email' ];
$content = $_POST [ 'content' ];
// ニックネーム
if ( $nickname == '' ) {
echo 'ニックネームが入力されていません。' ;
} else {
echo 'ようこそ、' . $nickname . '様' ;
}
// メールアドレス
if ( $email == '' ) {
echo 'メールアドレスが入力されていません。' ;
} else {
echo 'メールアドレス：' . $email ;
}
// お問い合わせ内容
if ( $content == '' ) {
echo 'お問い合わせ内容が入力されていません。' ;
} else {
echo 'お問い合わせ内容：' . $content ;
}
?>
<form method="POST" action="">
<input type="button" value="戻る" onclick="history.back()">
</form>
</body>
</html>