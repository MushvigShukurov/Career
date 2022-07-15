<?php
function AddDelimiter($array)
{
    static $newArray = [];
    foreach ($array as $element) {
        array_push($newArray, ("@$element@"));
    }
    return $newArray;
}
function shifreler($status = 1)
{
    $one = 'abcdefghijklmnopqrstuvwxyz';
    $two = strrev($one);
    $three = strtoupper($one);
    $four  = strtoupper($two);
    $result1 = $one . $three;
    $result2 = $two . $four;
    // $result1 = $three;
    // $result2 = $four;
    $result = ['correct' => $result1, 'reverse' => $result2];
    if ($status == 1) {
        return $result;
    } else {
        return false;
    }
}
function at_bash_1($text)
{
    $pattern     = [
        'ə', 'ı', 'ç', 'ş', 'ğ', 'ö', 'ü', "İ", 'Ə', "Ş", "Ç", 'Ğ', 'Ö', 'Ü',
    ];
    $replacement = [
        'e', 'i', 'c', 's', 'g', 'o', 'u', 'I', "E", 'S', "C", "G", "O", "U",
    ];
    $pattern1  = '#[a-zA-Z]#';




    $pattern = AddDelimiter($pattern);

    $text = preg_replace($pattern, $replacement, $text);
    preg_match_all($pattern1, $text,$newText);
    $text = implode('',$newText[0]);

    // $text = strtoupper($text);
    $len = strlen($text);
    $i = 0;
    $sifreler = shifreler()['correct'];
    $reversesifreler = shifreler()['reverse'];
    $newText = '';
    while ($i < $len) {
        $item = $text[$i];
        $item_pos = strpos($sifreler, $item);
        if ($item_pos == strpos($sifreler, $item)) {
            $item_pos = strpos($sifreler, $item);
            $newItem = $reversesifreler[$item_pos];
        } else {
            $item_pos = $i;
            $newItem  = $item;
        };
        $newText .= $newItem;
        $i++;
    }
    return $newText;
}

if (isset($_POST['atbash'])) {
    $text = htmlspecialchars($_POST['atbashtext']);
    $sifrelenmis = at_bash_1($text);
}
if (isset($_POST['atbashd'])) {
    $text = htmlspecialchars($_POST['atbashtext']);
    $sifrelenmis = at_bash_1($text);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="style.css">
    <title>Ustablogger \ At_Baş</title>
</head>

<body>

    <div class="container mt-3">
        <header class="pb-3 mb-4 border-bottom">
            <a href="https://ustablogger.com/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="favicon.png" alt="" width="32" height="32" class="me-2">
                <span class="fs-4">Ustablogger</span>
            </a>
        </header>
        <div>
            <h1 class="h2 mb-3">AtBash <b> Şifrələmə | Deşifrələmə </b></h1>
            <form action="" method="POST" class="mb-3">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="atbashtext" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Mətn</label>
                </div>
               
                <div class="mb-3">
                    <button type="submit" name="atbash" class="btn btn-primary"> RUN <i class="fas fa-play"></i></button>
                    <!-- <button type="submit" name="atbashd" class="btn btn-primary">Deşifrələ <i class="fas fa-play"></i></button> -->
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control " disabled readonly placeholder="Leave a comment here" id="floatingTextarea3" style="height: 100px"><?php if (isset($sifrelenmis)) {
                                                                                                                                                            echo $sifrelenmis;
                                                                                                                                                        } else {
                                                                                                                                                            echo "...";
                                                                                                                                                        } ?></textarea>
                    <label for="floatingTextarea3">Nəticə</label>
                </div>
            </form>
            <!-- <div class="alert alert-dark mb-3" role="alert">
                
            </div> -->
            <!-- <h1 class="h2 mb-3">AtBash Deşifrələmə</h1> -->
            <!-- <form action="" method="POST" class="mb-3">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="textd" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Mətn</label>
                </div>
                
                <div class="mb-3">
                    <button type="submit" name="atbashd" class="btn btn-primary">RUN <i class="fas fa-play"></i></button>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control " disabled readonly placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php if (isset($dsifrelenmis)) {
                                                                                                                                                            echo $dsifrelenmis;
                                                                                                                                                        } else {
                                                                                                                                                            echo "...";
                                                                                                                                                        } ?></textarea>
                    <label for="floatingTextarea2">Nəticə</label>
                </div>
            </form> -->
            <div class="mt-3">
            <a href="playFairFunctions.rar" class="btn btn-success"><i class="fas fa-download"></i>&nbsp;Yazdığım Funksiyanı Yüklə</a>
        </div>
        </div>
        <footer class="pt-3 mt-4 mb-3 text-muted border-top">
            &copy; <a href="https://ustablogger.com/"> Ustablogger.com </a>
        </footer>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>