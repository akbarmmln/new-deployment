<?php
    include('/phpseclib/Net/SSH2.php');
    $ssh = new Net_SSH2('103.152.118.253');
    if (!$ssh->login('root', 'CYGr%@dOYHc0')) {
        exit('Login Failed');
    }
    echo $ssh->exec('ls -la');
    echo $ssh->exec('logout');
?>