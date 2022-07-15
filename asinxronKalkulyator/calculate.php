<?php
error_reporting(0);
if (isset($_SERVER['REQUEST_METHOD'])) {
    if (isset($_POST['calculate'])) {
        $text = $_POST['calculate'];
        if(empty($text)){
            echo "Error";
            exit();
        }
        require_once 'calculator.php';
        
        $commands = Commands($text);
        $numbers  = Nums($text);
        if (array_keys($commands, '(') || array_keys($commands, ')')) {
            $result = 'Error';
        } else {
            $calc = new Calculator($commands, $numbers);
            $result = $calc->Calculate();
        };
        echo $result;
    } else {
        header('location:index.html');
        exit();
    }
} else {
    header('location:index.html');
    exit();
}
