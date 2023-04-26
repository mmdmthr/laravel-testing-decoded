<?php

class Substraction implements Operation
{
    public function run($num, $current)
    {
        return $current - $num;
    }
}