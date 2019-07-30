<?php
if (isset($_GET['go'])){
	// ----------------- Скрипт ------------------
	











	









	// ----------------- / Скрипт ----------------
	?>
	<form class="fomra" action="script.php" method="GET" style="margin-top: 100px">
		<button class="restart" type="submit" name="restart">RESTART</button>
	</form>	
	<?php
}
if (isset($_GET['restart'])){
	header('Location: /script.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Script</title>

	<style>
		.fomra {			 
			text-align: center;
		}

		.restart{
			background-color: pink;
		}

		.go {
			background-color: yellow;
		}
	</style>

</head>
<body>
	<form class="fomra" action="script.php" method="GET">
		<button class="go" type="submit" name="go">GO</button>
	</form>
</body>
</html>