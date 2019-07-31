<?php



$uri = $_SERVER['REQUEST_URI'];

echo '<ul>';
 
$p = explode("?page=", $uri);
print_r($p);
echo '<br>';
echo $uri;

for ($i = 1; $i < 11; $i++){    
    echo '<li><a href="'.$p[0] .'?page='.$i.'">' . $i . '</a></li>';
    if ($p[1]==3) echo "string";
}

echo '</ul>';

