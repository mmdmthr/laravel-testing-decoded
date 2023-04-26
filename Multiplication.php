<?php

class Multiplication implements Operation
{
    public function run($num, $current)
    {
        if ($current === 0) return $num;

        return $current * $num;
    }
}