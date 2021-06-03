<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <title>
            Schülerchat-Login
        </title>
    </head>
    <body>
        <header>
            <h1>Schülerchat-Login</h1>
            <nav>
                <ul style="padding:0;">
                    <li><a href="startseite.html">Startseite</a></li>
                    <li><a href="registrieren.php">Registrieren</a></li>
                    <li><a href="impressum.html">Impressum</a></li>
                </ul>
            </nav>
        </header>
        <br><br>
        <form method="post" action="login.php">
  	    <?php include('fehler.php'); ?>
  	    <div class="eingabe-gruppe">
  		<label>Benutzername</label>
  		<input type="text" name="benutzername" >
  	    </div>
  	    <div class="eingabe-gruppe">
  	    	<label>Passwort</label>
  	    	<input type="password" name="password">
  	    </div>
  	    <div class="eingabe-gruppe">
  	    	<button type="submit" class="bttn" name="login_benutzer">Login</button>
  	    </div>
        </form>
        <img src="chatlogo.png" width="300px" height="300px">
    </body>
</html>