<?php
session_start();
include("includes.php");
$naslov = "Uplatnica";
$fajl = "ucp";
$return = "ucp.php";
$ucp = "ucp-uplatnica";
$gpr = "1";
$gps = "ucp-uplatnica";



if(!isset($_SESSION['klijentid'])){
	header("Location: process.php?task=logout");
	die();
}

if(!isset($_GET['drzava'])){
	header("Location: index.php");
	die();
}

$drzava = mysql_real_escape_string($_GET['drzava']);

$klijent = query_fetch_assoc("SELECT * FROM `klijenti` WHERE `klijentid` = '{$_SESSION['klijentid']}'");



if($drzava == "srb")
{
	header("Content-type: image/png");
	$slika = @imagecreatefrompng('./assets/img/srbija.png');
	$boja = imagecolorallocate($slika, 255, 120, 0);

	imagestring($slika, 6, 35, 50, $klijent['ime'] . ' ' . $klijent['prezime'], $boja);
	imagestring($slika, 6, 35, 68, $klijent['email'], $boja);
	imagestring($slika, 6, 35, 130, "YOUR HOSTING", $boja);
	imagestring($slika, 6, 35, 200, "YOUR HOSTING", $boja);
	imagestring($slika, 6, 520, 60, "Iznos...", $boja);
	imagestring($slika, 6, 395, 103, "EX YU TRN", $boja);
	imagestring($slika, 3, 395, 180, "Iznos = Koliko novca zelite na racunu.", $boja);
}
else if($drzava == "cg")
{
	header("Content-type: image/png");
	$slika = @imagecreatefrompng('./assets/img/crnagora.png');
	$boja = imagecolorallocate($slika, 0, 0, 0);
	
	imagestring($slika, 5, 120, 72, $klijent['ime'] . ' ' . $klijent['prezime'], $boja);
	imagestring($slika, 5, 120, 92, $klijent['email'], $boja);
	
	imagestring($slika, 5, 120, 170, "Internet usluga", $boja);
	
	imagestring($slika, 5, 120, 250, "YOUR HOSTING", $boja);
	imagestring($slika, 6, 527, 90, "YOUR TRN", $boja);
	imagestring($slika, 3, 480, 135, "Cjena", $boja);
}
else if($drzava == "bih")
{
	header("Content-type: image/png");
	$slika = @imagecreatefrompng('./assets/img/bosna.png');
	$boja = imagecolorallocate($slika, 255, 120, 0);
	
	imagestring($slika, 5, 220, 25, $klijent['ime'] . ' ' . $klijent['prezime'], $boja);
	imagestring($slika, 3, 15, 45, $klijent['email'], $boja);
	imagestring($slika, 5, 120, 72, "Internet usluga", $boja);
	imagestring($slika, 6, 140, 130, "YOUR HOSTING", $boja);
	imagestring($slika, 6, 427, 82, "YOUR TRN", $boja);
	imagestring($slika, 3, 450, 135, "Neki iznos u KM.", $boja);
}
else if($drzava == "hr")
{
	header("Content-type: image/png");
	$slika = @imagecreatefrompng('./assets/img/hrvatska.png');
	$boja = imagecolorallocate($slika, 255, 120, 0);
	
	imagestring($slika, 5, 35, 90, $klijent['ime'] . ' ' . $klijent['prezime'], $boja);
	imagestring($slika, 3, 35, 110, "Vasa adresa", $boja);
	imagestring($slika, 3, 35, 130, $klijent['email'], $boja);
	imagestring($slika, 5, 35, 180, "Uskoro", $boja); 
	imagestring($slika, 6, 540, 50, "= Iznos uplate u KN", $boja);
	imagestring($slika, 6, 350, 175, "Uskoro", $boja);
	imagestring($slika, 6, 265, 215, "Vas OIB", $boja);
	imagestring($slika, 6, 200, 255, "Internet usluga", $boja);
}
else if($drzava == "mk")
{

}
else
{
	header("Location: index.php");
	die();
}

imagepng($slika);
imagedestroy($slika);

mysql_close();
?>
