<?php
require "db.php";
require "lib/randomengine.php";

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$random_url =  generate_string($permitted_chars, 10);
$bad = 0;

if(isset($_POST['create-link-btn'])) {
    if(trim($_POST['name-url'] == '')) {
        $bad = 1;
    }
    if($bad != 1){
        $links = R::dispense('links');
        $links->author = $_SERVER['REMOTE_ADDR'];
        $links->url = $_POST['name-url'];
        
        if(R::count('links',"shorted_url = ?", array($random_url))){
            $random_url =  generate_string($permitted_chars, 10);
        } else {
            $links->shorted_url = $random_url;
        }
        R::store($links);
        echo "Your shorted link is short.loc?l=".$random_url;

    } else{
        echo "Type your URL!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Link</title>
</head>
<body>
    <h1>Create your own short link</h1>
    <form id="create-link-form" method="post" action="/createlink.php">
        <label>Type URL</label>
        <input type="text" name="name-url" autocomplete="off" placeholder="URL here"/>
        <button type="submit" name="create-link-btn">Create!</button>
    </form>
</body>
</html>