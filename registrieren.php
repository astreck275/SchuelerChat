<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <title>
            Schülerchat-Registrierung
        </title>
    </head>
    <body>
        <header>
            <h1>Schülerchat-Registrierung</h1>
            <nav>
                <ul style="padding:0;">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="startseite.html">Startseite</a></li>
                    <li><a href="impressum.html">Impressum</a></li>
                </ul>
            </nav>
        </header>
        <form method="post" action="registrieren.php">
            <?php include('fehler.php'); ?>
            <div class="eingabe">
              <label>Benutzername</label>
              <input type="text" name="benutzername" value="<?php echo $benutzername; ?>">
            </div>
            <div class="eingabe-gruppe">
  	            <label>Email-Adresse</label>
  	            <input type="email" name="email" value="<?php echo $email; ?>">
  	        </div>
  	        <div class="eingabe-gruppe">
  	            <label>Passwort</label>
  	            <input type="password" name="password_1">
  	        </div>
  	        <div class="eingabe-gruppe">
  	            <label>Passwort bestätigen</label>
  	            <input type="password" name="password_2">
  	        </div>
  	        <div class="eingabe-gruppe">
  	            <button type="submit" class="bttn" name="reg_benutzer">Registrieren</button>
  	        </div>
        </form>
        <img src="chatlogo.png" width="300px" height="300px">
    </body>
</html>