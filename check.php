<!DOCTYPE html>
<html lang="ja">
<head>
<title>入力内容確認</title>
<meta charset="utf-8">
</head>
<body>
<h1>入力内容確認</h1>
<?php
$nick = htmlspecialchars($_POST['nick']);
$email = htmlspecialchars($_POST [ 'email' ]);
$content = htmlspecialchars($_POST [ 'content' ]);
// ニックネーム
if ( $nick == '' ) {
echo 'ニックネームが入力されていません。<br>' ;
} else {
echo 'ようこそ、' . $nick . '様<br>' ;
}
// メールアドレス
if ( $email == '' ) {
echo 'メールアドレスが入力されていません。<br>' ;
} else {
echo 'メールアドレス：' . $email.'<br>' ;
}
// お問い合わせ内容
if ( $content == '' ) {
echo 'お問い合わせ内容が入力されていません。<br>' ;
} else {
echo 'お問い合わせ内容：' . $content.'<br>' ;
}

?>
確認して問題がなければOKボタンを押してください
<form method="post" action ="thanks.php">
<input type="hidden" name="nick" value="<?php echo $nick; ?>" >
<input type="hidden" name="email" value="<?php echo $email; ?>" >
<input type="hidden" name="content" value="<?php echo $content; ?>" >
<input type="button" onclick="history.back()" value="戻る" >
<?php if($nick != '' && $email != '' && $content != ''): ?>
<input type="submit" value="OK" >
<?php endif; ?>
</form >
</body>
</html>