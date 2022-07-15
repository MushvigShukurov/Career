<?php

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sezarText']) && $_POST['sezarText'] != '') {
        // error_reporting(0);
        function securityForm($input)
        {
            return strip_tags(trim(htmlspecialchars($input)));
        }
        $response = securityForm($_POST['sezarText']);
        $vergulPos = strrpos($response,',');
        $sezarText = substr($response,0,$vergulPos);
        # Acari tenzimle
        $sezarKey  = substr($response,$vergulPos+1);
        if(!is_numeric($sezarKey) || $sezarKey==''){
            $sezarKey = 1;
        } 
        if($sezarKey>1000 || $sezarKey<0){
            $sezarKey = 1;
        };
        
        #statusTap
        $pattern = '/#deshifreEt/';
        $uygunlasdir = preg_match($pattern,$sezarText);
        if($uygunlasdir)
        {
            $sezarText = str_replace('#deshifreEt','',$sezarText);
        }

        
        function Cryption($password, $key, $status = 1)
        {
            if ($password == '' || !isset($password)) {
                $password = 'empty';
                $key = 0;
            }
            $newPassword   = '';
            $chLower       = 'a4bcde5fghi6jklmnopqrstuvwxyz0';
            // $chUpper       = strtoupper($chLower);
            $chUpper       = 'AB1CDE2FGHI3JK7LMNOPQR8STUV9WXYZ';
            $numbers       = '';
            $characters    = $chLower . $chUpper;
            $characters    = $characters . $numbers;
            $password      = str_split($password);
            if ($key > count($password)) {
                $key = $key % strlen($characters);
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

        # code...
        # Statusa uygun sifrele
        if($uygunlasdir==1){
            $sonHal = Cryption($sezarText,$sezarKey,0);
        }
        if($uygunlasdir==0){
            $sonHal = Cryption($sezarText,$sezarKey,1);
        }
        

        echo $sonHal;

    }
}
