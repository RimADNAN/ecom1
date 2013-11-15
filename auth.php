<?php

if($_POST['Envoyer'])
{
	if($_POST["log"] != "" && $_POST["pwd"] != "")
	{
		  $user = $_POST["log"] ;
		  $pass  = $_POST["pwd"] ;
			include("connection.php");
		  $sql = "SELECT statut FROM user WHERE login = '".$user."' AND pwd = '".$pass."'"	;
		  $requete = mysql_query($sql) or die($sql."<br>".mysql_error()) ;
		  
		  //on récupère le résultat
		 $result = mysql_fetch_object($requete) ;
		  
		  //si la requête s'est bien passée
		  if(is_object($result))
		  {
				session_start() ;
				$_SESSION["statut"] = $sql;
				
				//user
				if( $sql = 0 ) { header("Location: profil_u.php") ;}
				
				//admin
			    else { header("Location: profil_a.php") ;}
		  }
		  //auth incorrecte
		  else  {	header("Location: index.php") ; }
	}
	//log et pwd vide
	else	{  header("Location: index.php") ;}
}

?>
