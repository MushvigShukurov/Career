<?php
# Security Form | Data
function securityForm($data)
{
    return trim(strip_tags(htmlspecialchars($data)));
}

function getData($onePageCount, $aktivPage)
{
    global $newData;
    $start = ($onePageCount * $aktivPage) - $onePageCount;
    $newData = array_slice($newData, $start, $onePageCount);
    return $newData;
}
#pAgination FUNc
function paginationSettings($postSayi, $onePagePostCount, $aktivPage)
{
    $sehifeSayi             = $postSayi / $onePagePostCount;
    $sehifeSayi             = ceil($sehifeSayi);

    if ($aktivPage > 0) {
        if ($aktivPage == 2) {
            $baslangic = 1;
        } elseif ($aktivPage == 1) {
            $baslangic = 1;
        } elseif ($aktivPage > 2 && ($aktivPage < ($sehifeSayi - 1))) {
            $baslangic = $aktivPage - 2;
        } elseif ($aktivPage == $sehifeSayi) {
            $baslangic = $aktivPage - 4;
        } elseif ($aktivPage == ($sehifeSayi - 1)) {
            $baslangic = $aktivPage - 3;
        } else {
            $aktivPage = 1;
            $baslangic = 1;
        }
    } elseif ($aktivPage <= 0) {
        $aktivPage = 1;
        $baslangic = 1;
    }
    $sonPage                = $baslangic + 4;
    if ($sonPage > ceil($postSayi / $onePagePostCount)) {
        $sonPage = ceil($postSayi / $onePagePostCount);
    }
    if ($baslangic < 1) {
        $baslangic = 1;
    }
    return [$baslangic, $sonPage,$aktivPage];
}
