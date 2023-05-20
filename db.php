<?php
require "lib/rb.php";
R::setup( 'mysql:host=localhost;dbname=shortlink',
'user', 'password' ); //for both mysql or mariaDB
session_start();


?>
