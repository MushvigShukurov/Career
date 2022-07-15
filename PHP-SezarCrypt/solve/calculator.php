<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['calcValue']) && $_POST['calcValue'] != '') {
        function securityForm($input)
        {
            return strip_tags(trim(htmlspecialchars($input)));
        }
        $calcValue = securityForm($_POST['calcValue']);
        $calculation = $calcValue;
        $result = eval('return '.$calculation.';');
        echo $result;
    }
}
