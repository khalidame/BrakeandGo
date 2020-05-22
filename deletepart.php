<?php
require_once 'includes/functions.php';

$partid = $_GET['part'] ?? null;

// Just submit the partID to get deleted,  don't need to be clever and do error checking
//DELETE FROM products(??) WHERE partid=$partid;



header('Location: index.php');
