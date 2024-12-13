<?php

function dump(mixed ...$vars) 
{
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

function logToFile(mixed $data)
{
    file_put_contents(__DIR__ . '/../logs.txt', json_encode($data));
}