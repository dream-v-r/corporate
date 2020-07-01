<?php ini_set('display_errors',1); ?>
<?php
echo 'test';

//マイムタイプ定義
$mime_content_types = array(
  'ez'      => 'application/andrew-inset',
  'atom'    => 'application/atom+xml',
  'atomcat' => 'application/atomcat+xml',
  'avi'     => 'video/x-msvideo',
  'movie'   => 'video/x-sgi-movie',
  'ice'     => 'x-conference/x-cooltalk',
  'xlsx'	=>	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
);

//送信先メールアドレス
$to = 'hanari@dream-v.co.jp';

//送信元メールアドレス
$from = 'hanari@dream-v.co.jp';

//件名
$subject = '添付ファイルのテスト';

//メール本文
$message  = "テストメール。\n";
$message .= "添付ファイル送信のテストです。\n";

//添付ファイル
$files = array('img/【発注書　原紙】.xlsx');

//件名・本文をエンコード
$subject = mb_convert_encoding($subject, 'JIS', 'UTF-8');
$message = mb_convert_encoding($message, 'JIS', 'UTF-8');

$subject = '=?iso-2022-jp?B?' . base64_encode($subject) . '?=';

//バウンダリ文字列を定義
if (empty($files)) {
  $boundary = null;
} else {
  $boundary = md5(uniqid(rand(), true));
}

//メールボディを定義
if (empty($files)) {
  $body = $message;
} else {
  $body  = "--$boundary\n";
  $body .= "Content-Type: text/plain; charset=\"iso-2022-jp\"\n";
  $body .= "Content-Transfer-Encoding: 7bit\n";
  $body .= "\n";
  $body .= "$message\n";

  foreach($files as $file) {
    if (!file_exists($file)) {
      continue;
    }

    $info    = pathinfo($file);
    $content = $mime_content_types[$info['extension']];

    $filename = mb_convert_encoding(basename($file), 'JIS', 'UTF-8');
    //$filename = chunk_split(base64_encode(basename($file)));

    $body .= "\n";
    $body .= "--$boundary\n";
    $body .= "Content-Type: $content; name=\"$filename\"\n";
    $body .= "Content-Disposition: attachment; filename=\"$filename\"\n";
    $body .= "Content-Transfer-Encoding: base64\n";
    $body .= "\n";
    $body .= chunk_split(base64_encode(file_get_contents($file))) . "\n";
  }

  $body .= '--' . $boundary . '--';
}
echo $body;
//メールヘッダを定義
$header  = "X-Mailer: PHP5\n";
$header .= "From: $from\n";
$header .= "MIME-Version: 1.0\n";
if (empty($files)) {
  $header .= "Content-Type: text/plain; charset=\"iso-2022-jp\"\n";
} else {
  $header .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
}
$header .= "Content-Transfer-Encoding: 7bit";

//メール送信
if (mail($to, $subject, $body, $header)) {
  echo 'メールが送信されました。';
} else {
  echo 'メールの送信に失敗しました。';
}


?>