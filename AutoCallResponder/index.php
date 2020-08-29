<!DOCTYPE html>
<!-- saved from url=(0042)http://192.168.1.3:8012/avatar3/index.html -->
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>AB Tel Avatar</title>
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="soundboard.css">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
</head>

<body>
	<div style="width:51% !important; float:left !important; height: 100%; padding-right: 15px;">
		<iframe id="vicidial_iframe" style="height:960px !important;" src="Newcall/callt2.php" width="100%" height="100%"></iframe>
	</div>

	<div style="width:46% !important; float:left !important; height: 100%; padding-left: 10px;">

		<div style="height:960px !important;" id="iframe_soundboard" width="100%" height="100%">
			<a><img src="soundboardhi/images/hi2.jpg" height="50" width="50">
				<iframe align=right src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FKarachi" width="50%" height="85" frameborder="0" seamless></iframe><br>
				<br></a><a href="soundboardhi/soundboardhi.html">
				<h2 align=center>
					<font color="forestgreen"><b> Solar USA</b></font>
				</h2>
			</a>
			<div id="trackbox" width="80%"></div>
		</div>
		<footer>
			<div align=center>
				<font color="forestgreen">
					<a style="text-decoration: none" class="clock24" id="tz24-1543097930-tzest-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMCIsInNob3dzZWNvbmRzIjoiMCIsInNob3d0aW1lem9uZSI6IjEiLCJ0eXBlIjoiZCIsImxhbmciOiJlbiJ9" title="EST Time" target="_blank" rel="nofollow"><b>
							<font color="black">Eastern Time Zone</font>
						</b></a>
					<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
					<a style="text-decoration: none" class="clock24" id="tz24-1543098307-tzpst-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMCIsInNob3dzZWNvbmRzIjoiMCIsInNob3d0aW1lem9uZSI6IjEiLCJ0eXBlIjoiZCIsImxhbmciOiJlbiJ9" title="time at PST" target="_blank" rel="nofollow"><b>
							<font color="black">Pacific Time Zone</font>
						</b </a> <script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
						<a style="text-decoration: none" class="clock24" id="tz24-1543098546-tzcst-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMCIsInNob3dzZWNvbmRzIjoiMCIsInNob3d0aW1lem9uZSI6IjEiLCJ0eXBlIjoiZCIsImxhbmciOiJlbiJ9" title="CST timezone" target="_blank" rel="nofollow"><b>
								<font color="black">Central Time Zone</font>
							</b> </a>
						<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
						<br /><a style="text-decoration: none" class="clock24" id="tz24-1543099105-tzmst-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMCIsInNob3dzZWNvbmRzIjoiMCIsInNob3d0aW1lem9uZSI6IjEiLCJ0eXBlIjoiZCIsImxhbmciOiJlbiJ9" title="MST local time" target="_blank" rel="nofollow"><b>
								<font color="black">Mountain Time Zone</font>
							</b></a>
						<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
			</div>

			<h4 align=center>
				<font color="red">&copy;</font>
				<font color="black">Copyright AB TeleMarketing Pvt Limited.</font>
			</h4>
		</footer>
	</div>
	<script src="Newcall\js\jquery.js" ></script>
	<script src="Newcall/call2.js"></script>
<script>

var file=<?php session_start(); echo json_encode($_SESSION['file']); ?>;

</script>
	<script src="indexjs.js"></script>

		</div>
		<?php
		 include('hello.html');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqeela";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//$sql = "SELECT * FROM wordsandbuttons";
$sql = "SELECT *,CONVERT(SUBSTRING_INDEX(parent_of, '&', 1), UNSIGNED INTEGER) as result FROM wordsandbuttons ORDER BY result";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $parent_of = $row["parent_of"];
    $relation = $row["relation"];
    if($relation==1)$parent_of=$parent_of.'&forget';
    if($relation==2)$parent_of='must&forget';

    $timeout_time = $row["timeout_time"];
    $timeout_btn = $row["timeout_btn"];
    $txt = $row['txt'];
    $btn1 = $row['btn1'];
    $btn2 = $row['btn2'];
    $btn3 = $row['btn3'];
    $node_id = $row['node_id'];
    echo "parent_of.push('$parent_of'); node_id.push('$node_id');btn3.push('$btn3');timeout_time.push('$timeout_time');timeout_btn.push('$timeout_btn');txt.push('$txt');btn1.push('$btn1');btn2.push('$btn2');\n";
  }
}
		 ?>
		 
		</div>
	</div>

</body>

</html>