<?php
$serveur = "localhost"; 
$db = "eCom";
$login = "root";
$pwd = "";
$connexion= mysql_connect($serveur,$login,$pwd) or die ("erreur de connexion mysql : ".mysql_error());
mysql_select_db($db,$connexion) or die (mysql_error ());

?>
