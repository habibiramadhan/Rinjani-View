<?php

require_once("../config/helper.php");
require_once("../config/koneksi.php");

session_start();
unset($_SESSION['id']);
unset($_SESSION['role']);
session_destroy();



header("location: ". BASE_URL);