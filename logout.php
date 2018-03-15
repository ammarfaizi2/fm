<?php
session_start();
$_SESSION["path"] = null;
session_destroy();
header("location:index.php");