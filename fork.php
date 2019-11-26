<?php

$pid = pcntl_fork();

if ($pid === 0) {
    echo "I am the child!\n";
    sleep(3);
    echo "The child is still alive!\n";
} else {
    echo "I am the parent!\n";
    pcntl_wait($status);
}