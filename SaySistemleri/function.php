<?php
if(isset($_POST['saysistem']))
{
    $number = htmlspecialchars($_POST['saysistem']);
    $number_expl = explode(',',$number);
    $number = $number_expl[0];
    $format = $number_expl[1];
    if($number==''){
        echo '404';
        exit();
    }
    // Instagram/mushvigsh
   
    if($format==2){
        $onluq = base_convert($number,2,10);
    } elseif($format==8){
        $onluq = base_convert($number,8,10);
    } elseif($format==16){
        $onluq = base_convert($number,16,10);
    } else {
        $onluq = $number;
    }
    if($onluq>1000000000){
        echo '404';
    }
    $binary = base_convert($onluq,10,2);
    $oct = base_convert($onluq,10,8);
    $hex = base_convert($onluq,10,16);
    echo "$binary#$oct#$onluq#$hex";
}