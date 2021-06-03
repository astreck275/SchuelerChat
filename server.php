<?php
session_start();

$benutzername = "";
$email    = "";
$fehler = array(); 


$db2 = mysqli_connect('localhost', 'root', '');

$sql = "CREATE DATABASE Chatsystem";
if (mysqli_query($db2, $sql)) {
  echo "Datenbank erfolgreich eingerichtet.";
}



$db = mysqli_connect('localhost', 'root', '', 'Chatsystem');

$sql2 = "
    CREATE TABLE `benutzerliste` (
       `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       `benutzername` varchar(100) NOT NULL,
       `email` varchar(100) NOT NULL,
       `password` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (mysqli_query($db, $sql2)) {
    echo "Benutzertabelle eingerichtet.";
  } 


$sql3 = "
CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `benutzername` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

  if (mysqli_query($db, $sql3)) {
    echo "Chattabelle eingerichtet.";
  } 

if (isset($_POST['reg_benutzer'])) {
  $benutzername = mysqli_real_escape_string($db, $_POST['benutzername']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($benutzername)) { array_push($errors, "Du musst einen Benutzernamen eingeben."); }
  if (empty($email)) { array_push($errors, "Es ist eine Emailadresse erforderlich."); }
  if (empty($password_1)) { array_push($errors, "Es ist ein Passwort erforderlich."); }
  if ($password_1 != $password_2) {
	array_push($fehler, "Die Passwörter stimmen nicht überein.");
  }

  $benutzer_in_nutzung = "SELECT * FROM benutzerliste WHERE benutzername='$benutzername' OR email='$email' LIMIT 1";
  $erg = mysqli_query($db, $benutzer_in_nutzung);
  $benutzer = mysqli_fetch_assoc($erg);
  
  if ($benutzer) { 
    if ($benutzer['benutzername'] === $benutzername) {
      array_push($fehler, "Benutzername existiert bereits.");
    }

    if ($benutzer['email'] === $email) {
      array_push($fehler, "Email-Adresse existiert bereits.");
    }
  }

  if (count($fehler) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO benutzerliste (benutzername, email, password) 
  			  VALUES('$benutzername', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['benutzername'] = $benutzername;
  	$_SESSION['erfolg'] = "Erfolgreich regstriert.";
  	header('location: login.php');
  }
}


if (isset($_POST['login_benutzer'])) {
    $benutzername = mysqli_real_escape_string($db, $_POST['benutzername']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($benutzername)) {
        array_push($fehler, "Benutzername erforderlich");
    }
    if (empty($password)) {
        array_push($fehler, "Passwort erforderlich");
    }
  
    if (count($fehler) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM benutzerliste WHERE benutzername='$benutzername' AND password='$password'";
        $erg = mysqli_query($db, $query);
        if (mysqli_num_rows($erg) == 1) {
          $_SESSION['benutzername'] = $benutzername;
          $_SESSION['erfolg'] = "Du wurdest eingeloggt";
          header('location: home.php');
        }else {
            array_push($fehler, "Falscher Benutzername oder Passwort");
        }
    }
  }


  if(isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['benutzername']);
    header('location: login.php');
  }
  ?>