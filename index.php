<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $ms = $_GET['ms'];
    echo $ms;
    echo "<br>";
    include('Net/SSH2.php');
    $connection = ssh2_connect('103.152.118.253', 22);
    ssh2_auth_password($connection, 'root', 'CYGr%@dOYHc0');

    $stream1 = ssh2_exec($connection, 'cd prjct/4yur-dev-ms-one');
    echo $stream1;

    $stream2 = ssh2_exec($connection, 'ls');
    echo $stream2;

    $stream3 = ssh2_exec($connection, 'exit');
    echo $stream3;
?>