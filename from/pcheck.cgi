#!/usr/bin/perl

#��������������������������������������������������������������������
#�� Perl Checker - 2011/09/21
#�� Copyright (c) KentWeb
#�� http://www.kent-web.com/
#��������������������������������������������������������������������
#��������������������������������������������������������������������
#�� [���ӎ���]
#�� 1. ���̃v���O�����̓t���[�\�t�g�ł��B
#�� 2. ���̃v���O�������g�p���������Ȃ鑹�Q�ɑ΂��č�҂͈�؂̐ӔC��
#��    �����܂���B
#��������������������������������������������������������������������

# ���W���[���錾
use strict;
use CGI::Carp qw(fatalsToBrowser);

# �o�[�W�������
my $version = 'PerlChecker v3.1';

#===========================================================
#  ��{�ݒ�
#===========================================================

# �p�X���[�h
# �� �p�����Ńp�X���[�h���w�肷��ƁA���̃v���O�����̎��s�ɂ�
#    �p�X���[�h���K�{�ƂȂ�܂��B(�p������8�����ȓ��Ŏw��)
my $password = '';

# ������CGI�t�@�C���̊g���q�i�h�b�g�͋L�q���Ȃ��j
my @ext = ('cgi', 'pl');

# �ő�󗝃f�[�^�iBytes�j
# [��] 10240Bytes = 10KB
my $maxdata = 1024;

#===========================================================
#  �ݒ芮��
#===========================================================

# �f�[�^�󂯎��
my %in = &parse_form;

# ��ʕ\��
&header;
print qq|<div align="center">\n|;

# �p�X���[�h�`�F�b�N
if ($password ne '') {
	if ($in{pass} eq '') {
		print "<p>�p�X���[�h����͂��Ă�������</p>\n";
		print qq|<form action="pcheck.cgi" method="post">\n|;
		print qq|<input type="password" name="pass" size="10">\n|;
		print qq|<input type="submit" value=" �F�� "></form>\n|;
		print qq|</div>\n|;
		print qq|</body></html>\n|;
		exit;

	# �F�ؕs��
	} elsif ($in{pass} ne $password) {
		&error('�p�X���[�h���Ⴂ�܂�');
	}
}

	# �Ώۃt�@�C���̊g���q
	my ($msg,$ext);
	foreach (@ext) {
		$msg .= ".$_ ";
		$ext .= "$_|";
	}
	$ext =~ s/\|$//;

print <<"EOM";
<h3>Perl���@�`�F�b�J�[</h3>
<table border="0" cellspacing="1">
<tr>
	<td>
		<ul>
		<li>�t�H�[�����Ƀ`�F�b�N����t�@�C��������͂��Ă��������B
		<li>�g���q�� <b>$msg</b> �̂ݗL���ł��B
			<p>
				syntax OK ���@���@�㐳����<br>
				syntax error ���@���@�G���[
			</p>
		</ul>
	</td>
</tr>
</table>
<form action="pcheck.cgi" method="post">
<input type="hidden" name="pass" value="$in{pass}">
<input type="text" name="file" size="40" value="$in{file}">
<input type="submit" value="�`�F�b�N">
EOM

# �f�f�`�F�b�N�J�n
if ($in{file}) {

	print qq|<p><b>- �f�f���� -</b></p>\n|;

	# �t�@�C���`�F�b�N
	if ($in{file} !~ /^[\.\/\w\-]+\.($ext)$/) {
		&error("�t�@�C�������s���ł� �� $in{file}");
	}

	# ���݊m�F
	if (!-e $in{file}) {
		&error('�t�@�C�������݂��܂���');
	}

	# �擪�s�ǂݎ��
	open(IN,"$in{file}");
	my $top = <IN>;
	close(IN);

	print <<EOM;
<table border="0" cellspacing="1">
<tr>
	<th>���s�`��</th>
	<td>
EOM

	# ���s����
	my $path;
	if ($top =~ /(.*)\r\n$/) {
		print "CR+LF (Win�`��)\n";
		$path = $1;

	} elsif ($top =~ /(.*)\r$/) {
		print "CR�iMac�`��)\n";
		$path = $1;

	} elsif ($top =~ /(.*)\x0A$/) {
		print "LF (UNIX�`��)\n";
		$path = $1;

	} else {
		print "�s��\n";
		$path = '�s��';
	}

	print <<EOM;
	</td>
</tr><tr>
	<th>Perl�̃p�X</th>
	<td class="eng">$path</td>
</tr><tr>
	<th>�T�[�o��Perl<br>�Ƃ̃`�F�b�N</th>
	<td>
EOM

	# Perl�p�X�`�F�b�N
	$path =~ s/^\#\!\s*//;
	if (-e $path) {
		print "�����Ă��܂��B<br>\n";
	} else {
		print "�p�X���s���̂悤�ł��B<br>\n";
	}

	# �p�[�~�b�V����
	print <<EOM;
	<span class="eng">$path</span></td>
</tr><tr>
	<th>�p�[�~�b�V����</th>
	<td>
EOM

	if (-x $in{file}) {
		print "���s������B\n";
	} else {
		print "���s��������܂���B\n";
	}

	# ���@�`�F�b�N
	print <<EOM;
	</td>
</tr><tr>
	<th>���@�`�F�b�N</th>
	<td>
	<pre class="red eng">
EOM

	# Perl���@�`�F�b�N
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

# ���쌠�\�L�F�폜�֎~
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
#  �G���[����
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
#  �w�b�_�[
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
#  ���̓`�F�b�N
#-----------------------------------------------------------
sub sanit {
	local($_) = shift;

	s/[<>&"'%();+\0\r\n]//g;
	$_;
}

#-----------------------------------------------------------
#  �t�H�[���f�R�[�h
#-----------------------------------------------------------
sub parse_form {
	my ($buf,%in);
	if ($ENV{REQUEST_METHOD} eq "POST") {
		&error('�󗝂ł��܂���') if ($ENV{CONTENT_LENGTH} > $maxdata);
		read(STDIN, $buf, $ENV{CONTENT_LENGTH});
	} else {
		$buf = $ENV{QUERY_STRING};
	}
	foreach ( split(/&/, $buf) ) {
		my ($key,$val) = split(/=/);
		$val =~ tr/+/ /;
		$val =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("H2", $1)/eg;

		# �s�v�R�[�h
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

