<?php 

require('db.php');
$info = R::find('links', 'shorted_url = ?', array($_GET['l']));
if(!$info) {
    exit(header('Location: createlink.php'));
} else {
    foreach ($info as $row) {
        header('Location:'. $row['url']);
    }
}
?>
