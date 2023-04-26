<?php

class Calculator
{
    protected $result = 0;

    public function getResult()
    {
        return $this->result;
    }
    
    public function add($num)
    {
        $this->calculateAll(func_get_args(), '+');
    }

    public function substract($num)
    {
        $this->calculateAll(func_get_args(), '-');
    }

    protected function calculateAll(array $nums, $symbol)
    {
        foreach ($nums as $num) {
            $this->calculate($num, $symbol);
        }
    }

    protected function calculate($num, $symbol)
    {
        if (!is_numeric($num)) throw new InvalidArgumentException;

        switch ($symbol) {
            case '+':
                $this->result += $num;
                break;
            case '-':
                $this->result -= $num;
        }
    }
}