<?php
session_start();
$breakfast=$_POST['breakfast'];
$busfees=$_POST['busfees'];
$donation=$_POST['donation'];
$lunch=$_POST['lunch'];
$generaluse=$_POST['generaluse'];
$total =$breakfast+$busfees+$donation+$lunch+$generaluse;
		include("config/database.php");
		$query= "INSERT INTO dailyusage(breakfast,busfees,lunch,donation,generaluse,total) VALUES($breakfast,$busfees,$lunch,$donation,$generaluse,$total)";
		echo ($query);
		$result= mysqli_query($con,$query);
		if ($result) {
			header("location:index.php");
		}
// echo $breakfast."<br>".$busfees."<br>".$donation."<br>".$lunch."<br>".$generaluse;
$total = $breakfast + $busfees + $donation + $lunch + $generaluse;
$_SESSION['result'] = array($breakfast,$busfees,$donation,$lunch,$generaluse,$total);

 ?>