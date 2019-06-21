<?php
require "config.php";

echo(mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `test` ORDER BY `id` DESC LIMIT 1"))['text']);