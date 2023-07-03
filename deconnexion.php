<?php
session_start();
$_SESSION = array();
header('location:./inscription.php');