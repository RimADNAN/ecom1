<?php

session_start();
include("connection.php");

class Authentification{

   static function Test_auth()
   {   if($_POST['Envoyer'])
			{ if($_POST["log"] != "" && $_POST["pwd"] != "")
				{ 
				$user = $_POST["log"] ;
				$pass  = $_POST["pwd"] ;
				$sql = "SELECT statut FROM user WHERE login_user = '".$user."' AND pwd_user = '".$pass."'" ;
				$req = mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($req) > 0){ return true;	}
				return false;
			    }
			  return false;
		     }
	}
	
	static function Statut()
   {   if($_POST['Envoyer'])
			{ if($_POST["log"] != "" && $_POST["pwd"] != "")
				{ 
				$user = $_POST["log"] ;
				$pass  = $_POST["pwd"] ;
				$sql = "SELECT statut FROM user WHERE login_user = '".$user."' AND pwd_user = '".$pass."'" ;
				$req = mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($req) > 0){ $st = mysql_fetch_assoc($req); 	
											  return $st['statut'];
											}
				return false;
			    }
			  return false;
		     }
	}
		   
}

if(Authentification::Test_auth())
{
   switch(Authentification::Statut()){               
             case "1":
                header("Location: profil_a.php") ;;
                break;
             case "2":
                header("Location: profil_u.php") ;;
                break;
			}
	}else{ header("Location: index.php") ;}
?>
