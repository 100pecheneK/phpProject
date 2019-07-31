<?php
require 'db/db.php';

Db::getConnection();
if (isset($_GET['go'])){
	echo "<pre>";
	// ----------------- Скрипт ------------------
	


		$product = R::dispense('products');
        
        $product->name = 'PUBG';
        $product->code = 1;  
        $product->price = 299;
        $product->availability = 1;
        $product->image = 'low1.png';
        $product->brand = 'my';
        $product->description = 'PUBG PUBG';

        $category = R::findOne('categories', "name = ?", array('Экшн'));
        $category->name = 'Экшн';
        
        $product->sharedCategoryList[] = $category;
        
        R::store($product);


	









	// ----------------- / Скрипт ----------------
	?>
	<form class="fomra" action="script.php" method="GET" style="margin-top: 100px">
		<button class="restart" type="submit" name="restart">RESTART</button>
		<button class="restart" type="submit" name="end">END</button>
	</form>	
	<?php
}
if (isset($_GET['restart'])){
	header('Location: /script.php');
}
if (isset($_GET['end'])){
	header('Location: /');
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