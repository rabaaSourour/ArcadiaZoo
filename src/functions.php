<?php

function dump(mixed ...$vars) 
{
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}