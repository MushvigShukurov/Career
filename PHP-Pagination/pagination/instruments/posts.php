<div class="posts">
    <h1>
        <ion-icon name="apps-outline"></ion-icon> Postlar
    </h1>
    <?php
    if (isset($newData) && !empty($newData)) :
        $onePageCount = 5;
        if (isset($_GET['page'])) {
            $page = securityForm($_GET['page']);
        } else {
            $page = 1;
        }

        $fullDataCount = sizeof($newData);
        if (!is_numeric($page)) {
            $page = 1;
            $url = $url . "/page/$page";
            header("location:$url");
        } elseif ($page > ceil($fullDataCount / $onePageCount)) {
            $url = $url . '/' . "page/" . ceil($fullDataCount / $onePageCount);
            header("location:$url");
        } elseif ($page <= 0) {
            $url = $url . '/page/1';
            header("location:$url");
        }
        $newData = getData($onePageCount, $page);

        foreach ($newData as $dataItem) :
    ?>
            <div class="post">
                <h2><?= ucwords($dataItem['title'] . $dataItem['id']) ?></h2>
                <p><?= ucfirst(substr($dataItem['body'], 0, 100)) . '...' ?></p>
                <?php

                $postlarinTitle = $dataItem['title'];
                $seoDestekliTitle = str_replace([' ', 'ş', 'Ş', 'ü', 'Ü', 'ə', 'Ə', 'ğ', 'Ğ', 'ö', 'Ö', 'ı', 'İ'], ['-', 's', 'S', 'u', 'U', 'e', 'E', 'g', 'G', 'o', 'O', 'i', 'I'], $postlarinTitle);

                ?>
                <a href="<?= $url ?>/<?= $seoDestekliTitle ?>">Read</a>
            </div>
        <?php
        endforeach;
        require_once 'pagination.php';

    else :
        ?>

    <div class="postAlert">Post paylaşılmayıb !</div>

    <?php
    endif;


    ?>

</div>