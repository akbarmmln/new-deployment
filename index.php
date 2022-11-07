<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $ms = $_GET['ms'];
    echo $ms;
    echo "<br>";
    // include('Net/SSH2.php');
    // $ssh = new Net_SSH2('103.152.118.253', 22);
    // if (!$ssh->login('root', 'CYGr%@dOYHc0')) {
    //     echo "Login Failed";
    // }

    // echo $ssh->exec('cd prjct/"'.$ms.'"; ls');
    // echo $ssh->exec('exit');
    
    $connection = ssh2_connect('103.152.118.253', 22);
    ssh2_auth_password($connection, 'root', 'CYGr%@dOYHc0');

    echo "step: masuk ke lokasi project & list folder project <br>";
    $step1 = ssh2_exec($connection, 'cd microservices/"'.$ms.'"; git branch; ls');
    $sio_step1 = ssh2_fetch_stream($step1, SSH2_STREAM_STDIO);
    $err_step1 = ssh2_fetch_stream($step1, SSH2_STREAM_STDERR);

    stream_set_blocking($sio_step1, true);
    stream_set_blocking($err_step1, true);

    $result_dio_step1 = stream_get_contents($sio_step1);
    $result_err_step1 = stream_get_contents($err_step1);

    echo 'stdio : ' . $result_dio_step1;
    echo "<br>";
    echo 'stderr: ' . $result_err_step1;

    echo "<br><br>";

    echo "step: masuk ke branch main dan update repository branch main <br>";
    $step2 = ssh2_exec($connection, 'cd microservices/"'.$ms.'"; git checkout main; git pull origin main; git branch; ls');
    $sio_step2 = ssh2_fetch_stream($step2, SSH2_STREAM_STDIO);
    $err_step2 = ssh2_fetch_stream($step2, SSH2_STREAM_STDERR);

    stream_set_blocking($sio_step2, true);
    stream_set_blocking($err_step2, true);

    $result_dio_step2 = stream_get_contents($sio_step2);
    $result_err_step2 = stream_get_contents($err_step2);

    echo 'stdio : ' . $result_dio_step2;
    echo "<br>";
    echo 'stderr: ' . $result_err_step2;

    echo "<br><br>";

    echo "step: hapus folder node_modules & jalankan npm install <br>";
    $step3 = ssh2_exec($connection, 'cd microservices/"'.$ms.'"; git checkout main; git pull origin main; git branch; rm -rf node_modules; npm install; ls');
    $sio_step3 = ssh2_fetch_stream($step3, SSH2_STREAM_STDIO);
    $err_step3 = ssh2_fetch_stream($step3, SSH2_STREAM_STDERR);

    stream_set_blocking($sio_step3, true);
    stream_set_blocking($err_step3, true);

    $result_dio_step2 = stream_get_contents($sio_step3);
    $result_err_step2 = stream_get_contents($err_step3);

    echo 'stdio : ' . $result_dio_step3;
    echo "<br>";
    echo 'stderr: ' . $result_err_step3;

?>