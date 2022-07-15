<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= $cssLink ?>">
<title><?php if (isset($onlyPost) && !empty($onlyPost)) { echo ucwords($onlyPost[0]['title']); } else { echo "Ustablogger | Not Found";}?></title>