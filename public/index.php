<?php
function munge($string,$len=5) {
	$alphabet = 'bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXZ0123456789';
	$rv = '';
	$seed = sha1('nanunanu' . $string);
	for($i=0;$i<strlen($seed);$i+=2) {
		$slab = hexdec($seed[$i] . $seed[$i+1]);
		$val = $alphabet[$slab % strlen($alphabet)];
		$rv .= $val;
		if(strlen($rv) >= $len) {
			return $rv;
		}
	}
}
if(!isset($_GET['plan'])) {
	$seed = munge(rand());
	header("Location: /?plan=$seed");
	exit;
}
$seed = $_GET['plan'];
if(!preg_match('/^[\w\d]{5}$/',$seed)) {
	header("Location: /");
	exit;
}
$seed2 = munge(rand());

print <<<EOT
<!-- http://github.com/hinathan/bplangen -->
<style>
* {
	font-family: Helvetica;
	color:white;
}
body {
	background-color:#40442D;
}
.top {
	position: absolute;
	top:120px;
	left:270px;
	max-width:500px;
	max-height:500px;
	z-index:2;
	-webkit-transform:rotate(3deg);
	border:none;
}
.back {
	position: absolute;
	top:0px;
	left:0px;
	z-index:1;
	border:none;
}
p {
	position:absolute;
	top:0px;
	left:0px;
	z-index:3;
	padding:3px;
}
.re {
	font-size:80%;
}
</style>
<title>Business plan generator</title>
<a href="/?plan=$seed2">
<img src="/graph.php?plan=$seed" class="top"/>
<img src="/napkin.jpg" class="back" />
</a>

<p>
Business plan generator &mdash; Click the napkin for a new business plan!<br/>
<span class="re">A silly toy made by <a href="https://www.facebook.com/hinathan">Nathan Schmidt</a>.<br/>
<a href="http://github.com/hinathan/bplangen">(code)</a><br/>
</span>
</p>
EOT;
$stats = '../content/stats.txt';
if(file_exists($stats)) {
  print file_get_contents($stats);
 }
?>
