<?php
function limit_echo($x, $length)
{
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

function timestamp_to_date($timestamp)
{
    return date('F j, Y', $timestamp);
}
