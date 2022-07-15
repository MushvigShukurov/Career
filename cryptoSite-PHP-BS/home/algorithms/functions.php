<?php 
function FormSecurity($value){
    return htmlentities(strip_tags(trim(htmlspecialchars($value))));
}