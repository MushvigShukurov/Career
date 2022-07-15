$(function () {
    let TotalImages = [
        "http://localhost/FrontCodeAcademy/17May/src/img/img(1).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(2).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(3).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(4).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(5).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(6).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(7).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(8).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(9).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(10).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(11).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(12).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(13).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(14).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(15).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(16).jpg",
        "http://localhost/FrontCodeAcademy/17May/src/img/img(17).jpg",
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
