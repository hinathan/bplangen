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
<a href=/>
<img src="/graph.php" class="top"/>
<img src="/napkin.jpg" class="back" />
</a>

<p>
Business plan generator<br/>
<span class="re">A silly toy made by <a href="https://www.facebook.com/hinathan">Nathan Schmidt</a>.<br/>
<a href="http://github.com/hinathan/bplangen">(code)</a>
</span>
</p>
<?php
$stats = '../content/stats.txt';
if(file_exists($stats)) {
  print file_get_contents($stats);
 }
?>
