<?php

require_once __DIR__ . '/vendor/autoload.php';

$thread = new class extends Thread
{
    public function run()
    {
        echo "Hello World\n";
    }
};

$thread->start() && $thread->join();

echo "Quitting now\n";
