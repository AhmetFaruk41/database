<?php
try {
    $db=new PDO("mysql:host=localhost;dbname=demo_firin;charset=utf8",'firin_user','5Ma5jf^8');
    $rewurlbase="/";
}
catch (PDOExpception $e) {
    echo $e->getMessage();
}
?>
