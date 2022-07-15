$(function () {
    let TotalImages = [
        "http://localhost/FrontCodeAcademy/17May/src/img/img(11).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(11).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(12).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(13).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(14).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(15).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(16).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(17).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(18).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(19).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(20).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(21).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(22).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(23).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(24).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(25).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(26).jpg",
    ];
    setInterval(() => {
        $mainImg = $("#mainImg");
        $dataId = parseInt($mainImg.attr("data-id"));
        $images = $(".scroll img");
        $images.each(function (e) {
          
            $imgDataId = $(this).attr("data-id");
            $(this).removeClass("active");
            if ($imgDataId == $dataId) {
                $(this).addClass("active");
            }
        });
    }, 200);
    $images = $(".scroll img");
    $mainImg = $("#mainImg");
    $arrowLeft = $(".left");
    $arrowRight = $(".right");
    $images.each(function (e) {
        $(this).click(function () {
            $imgSrc = this.src;
            $imgDataId = $(this).attr("data-id");
            $mainImg.attr("src", $imgSrc)
            $mainImg.attr("data-id", $imgDataId);
        })
    });
    $arrowLeft.on("click", function () {
        $mainImg = $("#mainImg");
        $dataId = parseInt($mainImg.attr("data-id"));
        if ($dataId == 0) {
            $dataId = TotalImages.length;
        }
        $dataId--;
        $imgSrc = TotalImages[$dataId];
        $mainImg.attr("src", $imgSrc).attr("data-id", $dataId);
    });
    $arrowRight.on("click", function () {
        $mainImg = $("#mainImg");
        $dataId = parseInt($mainImg.attr("data-id"));
        if ($dataId == TotalImages.length - 1) {
            $dataId = -1;
        }
        $dataId++;
        $imgSrc = TotalImages[$dataId];
        $mainImg.attr("src", $imgSrc).attr("data-id", $dataId);
    })

});
