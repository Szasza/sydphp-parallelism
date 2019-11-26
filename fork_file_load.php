<?php

$file_content = file_get_contents('file.txt');

var_dump('Memory usage pre-fork: ' . memory_get_usage() / 1024 / 1024);

$pid = pcntl_fork();

if ($pid === 0) {
    var_dump('Memory usage post-fork in child: ' . memory_get_usage() / 1024 / 1024);
} else {
    var_dump('Memory usage post-fork in parent: ' . memory_get_usage() / 1024 / 1024);
    pcntl_wait($status);
}

