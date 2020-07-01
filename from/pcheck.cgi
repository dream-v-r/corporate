#!/usr/bin/perl

#┌─────────────────────────────────
#│ Perl Checker - 2011/09/21
#│ Copyright (c) KentWeb
#│ http://www.kent-web.com/
#└─────────────────────────────────
#┌─────────────────────────────────
#│ [留意事項]
#│ 1. このプログラムはフリーソフトです。
#│ 2. このプログラムを使用したいかなる損害に対して作者は一切の責任を
#│    負いません。
#└─────────────────────────────────

# モジュール宣言
use strict;
use CGI::Carp qw(fatalsToBrowser);

# バージョン情報
my $version = 'PerlChecker v3.1';

#===========================================================
#  基本設定
#===========================================================

# パスワード
# → 英数字でパスワードを指定すると、このプログラムの実行には
#    パスワードが必須となります。(英数字で8文字以内で指定)
my $password = '';

# 許可するCGIファイルの拡張子（ドットは記述しない）
my @ext = ('cgi', 'pl');

# 最大受理データ（Bytes）
# [例] 10240Bytes = 10KB
my $maxdata = 1024;

#===========================================================
#  設定完了
#===========================================================

# データ受け取り
my %in = &parse_form;

# 画面表示
&header;
print qq|<div align="center">\n|;

# パスワードチェック
if ($password ne '') {
	if ($in{pass} eq '') {
		print "<p>パスワードを入力してください</p>\n";
		print qq|<form action="pcheck.cgi" method="post">\n|;
		print qq|<input type="password" name="pass" size="10">\n|;
		print qq|<input type="submit" value=" 認証 "></form>\n|;
		print qq|</div>\n|;
		print qq|</body></html>\n|;
		exit;

	# 認証不可
	} elsif ($in{pass} ne $password) {
		&error('パスワードが違います');
	}
}

	# 対象ファイルの拡張子
	my ($msg,$ext);
	foreach (@ext) {
		$msg .= ".$_ ";
		$ext .= "$_|";
	}
	$ext =~ s/\|$//;

print <<"EOM";
<h3>Perl文法チェッカー</h3>
<table border="0" cellspacing="1">
<tr>
	<td>
		<ul>
		<li>フォーム内にチェックするファイル名を入力してください。
		<li>拡張子は <b>$msg</b> のみ有効です。
			<p>
				syntax OK →　文法上正しい<br>
				syntax error →　文法エラー
			</p>
		</ul>
	</td>
</tr>
</table>
<form action="pcheck.cgi" method="post">
<input type="hidden" name="pass" value="$in{pass}">
<input type="text" name="file" size="40" value="$in{file}">
<input type="submit" value="チェック">
EOM

# 診断チェック開始
if ($in{file}) {

	print qq|<p><b>- 診断結果 -</b></p>\n|;

	# ファイルチェック
	if ($in{file} !~ /^[\.\/\w\-]+\.($ext)$/) {
		&error("ファイル名が不正です → $in{file}");
	}

	# 存在確認
	if (!-e $in{file}) {
		&error('ファイルが存在しません');
	}

	# 先頭行読み取り
	open(IN,"$in{file}");
	my $top = <IN>;
	close(IN);

	print <<EOM;
<table border="0" cellspacing="1">
<tr>
	<th>改行形式</th>
	<td>
EOM

	# 改行判定
	my $path;
	if ($top =~ /(.*)\r\n$/) {
		print "CR+LF (Win形式)\n";
		$path = $1;

	} elsif ($top =~ /(.*)\r$/) {
		print "CR（Mac形式)\n";
		$path = $1;

	} elsif ($top =~ /(.*)\x0A$/) {
		print "LF (UNIX形式)\n";
		$path = $1;

	} else {
		print "不明\n";
		$path = '不明';
	}

	print <<EOM;
	</td>
</tr><tr>
	<th>Perlのパス</th>
	<td class="eng">$path</td>
</tr><tr>
	<th>サーバのPerl<br>とのチェック</th>
	<td>
EOM

	# Perlパスチェック
	$path =~ s/^\#\!\s*//;
	if (-e $path) {
		print "合っています。<br>\n";
	} else {
		print "パスが不正のようです。<br>\n";
	}

	# パーミッション
	print <<EOM;
	<span class="eng">$path</span></td>
</tr><tr>
	<th>パーミッション</th>
	<td>
EOM

	if (-x $in{file}) {
		print "実行権あり。\n";
	} else {
		print "実行権がありません。\n";
	}

	# 文法チェック
	print <<EOM;
	</td>
</tr><tr>
	<th>文法チェック</th>
	<td>
	<pre class="red eng">
EOM

	# Perl文法チェック
	open(PROC,"perl -c $in{file} 2>&1 |");
	print <PROC>;
	close(PROC);

	print <<EOM;
	</pre>
	</td>
</tr>
</table>
EOM
}

# 著作権表記：削除禁止
print <<"EOM";
<p class="eng" style="font-size:10px;">
- <a href="http://www.kent-web.com/">PerlChecker</a> -
</p>
</div>
</body>
</html>
EOM
exit;

#-----------------------------------------------------------
#  エラー処理
#-----------------------------------------------------------
sub error {
	my $err = shift;

	print <<"EOM";
<p>$err</p>
</div>
</body>
</html>
EOM
	exit;
}

#-----------------------------------------------------------
#  ヘッダー
#-----------------------------------------------------------
sub header {
	print "Content-type: text/html\n\n";
	print <<EOM;
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=shift_jis">
<meta http-equiv="content-style-type" content="text/css">
<style type="text/css">
<!--
body,th,td { background:#f0f0f0; font-size:80%; }
pre.red { color:#dd0000; }
table { background:#8080c0; }
th { background:#dcdced; padding:10px; }
td { background:#fff; padding:10px; }
.eng { font-family:Verdana,Helvetica,Arial; }
-->
</style>
<title>$version</title>
</head>
<body>
EOM
}

#-----------------------------------------------------------
#  入力チェック
#-----------------------------------------------------------
sub sanit {
	local($_) = shift;

	s/[<>&"'%();+\0\r\n]//g;
	$_;
}

#-----------------------------------------------------------
#  フォームデコード
#-----------------------------------------------------------
sub parse_form {
	my ($buf,%in);
	if ($ENV{REQUEST_METHOD} eq "POST") {
		&error('受理できません') if ($ENV{CONTENT_LENGTH} > $maxdata);
		read(STDIN, $buf, $ENV{CONTENT_LENGTH});
	} else {
		$buf = $ENV{QUERY_STRING};
	}
	foreach ( split(/&/, $buf) ) {
		my ($key,$val) = split(/=/);
		$val =~ tr/+/ /;
		$val =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("H2", $1)/eg;

		# 不要コード
		$val =~ s/&/&amp;/g;
		$val =~ s/</&lt;/g;
		$val =~ s/>/&gt;/g;
		$val =~ s/"/&quot;/g;
		$val =~ s/'/&#39;/g;
		$val =~ s/[\r\n]//g;

		$in{$key} = $val;
	}
	return %in;
}

