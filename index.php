<?php

include_once 'includes/config.php';
include_once 'includes/Database.php';


$db = new Database();

echo $db->connect();