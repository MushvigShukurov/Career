<?php
function Cryption($password, $key, $status = 1)
    {
        $newPassword   = '';
        $chLower       = 'abcdefghijklmnopqrstuvwxyz';
        $chUpper       = strtoupper($chLower);
        // $chUpper       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers       = '1234567890';
        $characters    = $chLower . $chUpper;
        $characters    = $characters . $numbers;
        $password      = str_split($password);
        if ($key > count($password)) {
            $key = $key / strlen($characters);
        }
        if ($status === 1) {
            foreach ($password as $value) {
                $position  = strpos($characters, $value);
                if ($position != '') {
                    $index     = (int)$position + (int)$key;
                    $index = $index - strlen($characters);
                    if ($index >= strlen($characters) - 1) {
                        (int)$index = $index - strlen($characters);
                    } elseif ($index < 0) {
                        $index = $index + strlen($characters);
                    }
                    $newChr    = $characters[$index];
                } else {
                    $newChr    = $value;
                }
                $newPassword  .= $newChr;
            }
        } else {
            foreach ($password as $value) {
                $position  = strpos($characters, $value);
                if ($position != '') {
                    $index     = (int)$position - (int)$key;
                    if ($index >= strlen($characters) - 1) {
                        (int)$index = $index - strlen($characters);
                    } elseif ($index < 0) {
                        $index = $index + strlen($characters);
                    }
                    $newChr    = $characters[$index];
                } else {
                    $newChr    = $value;
                }
                $newPassword  .= $newChr;
            }
        }
        return $newPassword;
    }