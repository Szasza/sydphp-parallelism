<?php

$file_content = file_get_contents('file.txt');

var_dump(memory_get_usage() / 1024 / 1024);
