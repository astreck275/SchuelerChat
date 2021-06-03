<?php include('server.php'); ?>

<?php
	$db = mysqli_connect('localhost', 'root', '', 'Chatsystem');
	$query = "SELECT * FROM chat ORDER BY id_chat ASC";
	$run = $db->query($query) or die("Letzter Fehler: {$db->error}\n");

	while($row = $run->fetch_array()) :
?>
	<div id="chat_data">
		<span style="color: green"><?php echo $row['benutzername']; ?> :</span>
		<span style="color: brown"><?php echo $row['msg']; ?></span>
	</div>
<?php endwhile; ?>