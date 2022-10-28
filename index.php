<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $ms = $_GET['ms'];
    echo $ms;
    echo "<br>";
    include('Net/SSH2.php');
    $ssh = new Net_SSH2('103.152.118.253', 22);
    if (!$ssh->login('root', 'CYGr%@dOYHc0')) {
        echo "Login Failed";
    }
    $stream1 = $ssh->exec('ls');
    stream_set_blocking($stream1, true);
    $output1 = stream_get_contents($stream1);
    print_r($output);
    
    echo $ssh->exec('exit');
?>