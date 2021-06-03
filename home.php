<?php include('server.php'); 
$db = mysqli_connect('localhost', 'root', '', 'Chatsystem');
if(empty($_SESSION['benutzername']))
{
	header('location: startseite.html');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Box</title>
	<link rel="stylesheet" href="style.css" media="all">
	<script type="text/javascript">
		function ajax() {

			var req = new XMLHttpRequest();

			req.onreadystatechange = function() {
				if(req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();

		}
		setInterval(function() {ajax()}, 1000);
	</script>
</head>
</head>
<body onload="ajax();">
<div id="container">
	<div id="chat_box">
		<div id="chat"></div>
	</div>
	<form method="post" action="home.php">
		<textarea name="msg" placeholder="Nachricht eingeben" maxlength="150"></textarea>
		<input type="submit" name="submit" value="abschicken">
		<p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
	</form>

	<?php 
	if(isset($_POST['submit'])) {
		$nachricht = $_POST['msg'];
		$name=$_SESSION['benutzername'];
		$query = "INSERT INTO chat (benutzername,msg) VALUES ('$name','$nachricht') "; 

		$run = $db->query($query);

	}
	?>
</div>


</body>
</html>