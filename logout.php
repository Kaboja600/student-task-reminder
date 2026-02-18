<?php
include "db.php";
session_destroy();
header("Location: landing.php");
exit();