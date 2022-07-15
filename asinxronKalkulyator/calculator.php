<?php
// $text = '3+(4-2)'; # Bu cur yazilisi hesablamayacaq!          # Result : Error
// $text = '@9'; # Kokalma ucun istifade et                   # Result : 3
// $text = '3*7/21-5+6/2+8/2*4'; # * / + - ucun istifade et   # Result : 0
// $text = '6+6';                                             # Result : 12
// $text = '6+6/3';                                           # Result : 8
// $text = '@81';                                             # Result : 9
# Instagram : mushvigsh
# Author : Shukurov Mushvig
function Commands($text)
{
    $pattern = '#\W#';
    preg_match_all($pattern, $text, $commands);
    return $commands[0];
}
function Nums($text)
{
    $pattern = '#[0-9]{1,}#';
    preg_match_all($pattern, $text, $numbers);
    return $numbers[0];
}
class Calculator
{
    private $numbers;
    private $commands;
    private $result;
    private $countNumbers;
    private $firstItem;
    public function __construct($commands, $numbers)
    {
        $this->commands     = $commands;
        $this->result       = $numbers[0];
        $this->firstItem    = array_shift($numbers);
        $this->numbers      = $numbers;
        $this->countNumbers = sizeof($this->numbers);
    }
    public function Calculate()
    {
        $indexVarligih = count(array_keys($this->commands, "*"));
        while ($indexVarligih) {
            $index = array_search('*', $this->commands);
            if (isset($this->numbers[$index - 1])) {
                $this->numbers[$index - 1] *= $this->numbers[$index];
            } else {
                $this->result *= $this->numbers[$index];
            }
            unset($this->commands[$index]);
            unset($this->numbers[$index]);
            $indexVarligih--;
        }
        if (count(array_keys($this->commands, "*"))) {
            $this->Calculate();
        }
        $indexVarligib = count(array_keys($this->commands, "/"));
        while ($indexVarligib) {
            $index = array_search('/', $this->commands);
            if (isset($this->numbers[$index - 1])) {
                $this->numbers[$index - 1] /= $this->numbers[$index];
            } else {
                $this->result /= $this->numbers[$index];
            }
            unset($this->commands[$index]);
            unset($this->numbers[$index]);
            $indexVarligib--;
        }
        if (count(array_keys($this->commands, "/"))) {
            $this->Calculate();
        }

        # Instagram : mushvigsh
        for ($i = 0; $i < $this->countNumbers; $i++) {

            if (isset($this->commands[$i]) && $this->commands[$i] == '-') {
                $this->Subtraction($this->numbers[$i]);
            }
            if (isset($this->commands[$i]) && $this->commands[$i] == '+') {
                $this->Addition($this->numbers[$i]);
            }
            if (isset($this->commands[$i]) && $this->commands[$i] == '*') {
                $this->Multiplication($this->numbers[$i]);
            }
            if (isset($this->commands[$i]) && $this->commands[$i] == '/') {
                $this->Division($this->numbers[$i]);
            }
        };
        if (isset($this->commands[0]) && $this->commands[0] == '@') {
            $this->SQRTFUNK($this->firstItem);
        }
        return $this->result;
    }
    private function Addition(...$args)
    {

        foreach ($args as $num) {
            $this->result += $num;
        }
    }
    private function Subtraction(...$args)
    {
        foreach ($args as $num) {
            $this->result -= $num;
        }
    }
    private function Multiplication(...$args)
    {
        foreach ($args as $num) {
            $this->result *= $num;
        }
    }
    private function Division(...$args)
    {
        foreach ($args as $num) {
            $this->result /= $num;
        }
    }
    private function SQRTFUNK($num)
    {
        $this->result = sqrt($num);
    }
}
# Instagram : mushvigsh

// $commands = Commands($text);
// $numbers  = Nums($text);
// if (array_keys($commands, '(') || array_keys($commands, ')')) {
//     echo "Error";
// } else {
//     $calc = new Calculator($commands, $numbers);
//     echo "<pre>";
//     print_r($calc->Calculate());
// };
# Instagram : mushvigsh