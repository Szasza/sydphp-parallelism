<?php

$runtime = new \parallel\Runtime();

$file_content = file_get_contents('file.txt');

var_dump('Memory usage in parent: ' . memory_get_usage() / 1024 / 1024);

$future = $runtime->run(function(){
    var_dump('Memory usage in child: ' . memory_get_usage() / 1024 / 1024);

    return "easy";
});

printf("\nUsing \\parallel\\Runtime is %s\n", $future->value());