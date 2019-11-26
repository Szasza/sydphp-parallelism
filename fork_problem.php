<?php

$pid = pcntl_fork();

$db = new mysqli('mysql', 'sydphp','sydphp', 'sydphp');

if ($pid === 0) { // child
    sleep(3);

    $db->close();
} else { // parent
    $db->query('SHOW TABLES');

    sleep(5);

    $db->query('SHOW TABLES');
}