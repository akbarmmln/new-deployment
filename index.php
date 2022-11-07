<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // $ms = $_GET['ms'];
    // echo $ms;
    // echo "<br>";
    // include('Net/SSH2.php');
    // $ssh = new Net_SSH2('103.152.118.253', 22);
    // if (!$ssh->login('root', 'CYGr%@dOYHc0')) {
    //     echo "Login Failed";
    // }

    // echo $ssh->exec('cd prjct/"'.$ms.'"; ls');
    // echo $ssh->exec('exit');

    $connection = ssh2_connect('103.152.118.253', 22);
    ssh2_auth_password($connection, 'root', 'CYGr%@dOYHc0');

    echo "step: masuk ke lokasi project <br>";
    $step1 = ssh2_exec($connection, 'cd microservices/4yur-dev-ms-one');
    $sio_step1 = ssh2_fetch_stream($tahap1, SSH2_STREAM_STDIO);
    $err_step1 = ssh2_fetch_stream($tahap1, SSH2_STREAM_STDERR);

    stream_set_blocking($sio_step1, true);
    stream_set_blocking($err_step1, true);

    $result_dio_step1 = stream_get_contents($sio_step1);
    $result_err_step1 = stream_get_contents($err_step1);

    echo 'stdio : ' . $result_dio_step1;
    echo "<br>";
    echo 'stderr: ' . $result_err_step1;

    echo "step: list folder project <br>";
    $step2 = ssh2_exec($connection, 'ls');
    $sio_step2 = ssh2_fetch_stream($tahap2, SSH2_STREAM_STDIO);
    $err_step2 = ssh2_fetch_stream($tahap2, SSH2_STREAM_STDERR);

    stream_set_blocking($sio_step2, true);
    stream_set_blocking($err_step2, true);

    $result_dio_step2 = stream_get_contents($sio_step2);
    $result_err_step2 = stream_get_contents($err_step2);

    echo 'stdio : ' . $result_dio_step2;
    echo "<br>";
    echo 'stderr: ' . $result_err_step2;

?>