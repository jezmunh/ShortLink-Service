<?php
require "lib/rb.php";
R::setup( 'mysql:host=localhost;dbname=shortlink',
'root', 'root' ); //for both mysql or mariaDB
session_start();


?>