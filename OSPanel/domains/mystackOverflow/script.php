<?php

require "includes/db.php";

$tag = R::findAll('tags');

$tag->name = 'test';

R::store($tag);

echo '<pre>'

