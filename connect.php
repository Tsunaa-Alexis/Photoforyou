<?php
    $hote = 'localhost';
    $base = 'test';
    $user = 'root';
    $pass = '';
    $cnx = mysql_connect($hote, $user, $pass) or die(mysql_error());
    $ret = mysql_select_db($base) or die(mysql_error());
?>