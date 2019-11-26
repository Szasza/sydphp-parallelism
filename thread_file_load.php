<?php

require_once __DIR__ . '/vendor/autoload.php';

$file_content = file_get_contents('file.txt');

var_dump('Memory usage in original thread: ' . memory_get_usage() / 1024 / 1024);

$thread = new class extends Thread
{
    public function run()
    {
        var_dump('Memory usage in new thread: ' . memory_get_usage() / 1024 / 1024);
    }
};

$thread->start() && $thread->join();
