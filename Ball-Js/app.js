var box = document.querySelector(".box");
var ball = document.getElementById("ball");

var buttons = document.querySelectorAll("button");

var Box = document.getElementById("bx");
var Ball = document.getElementById("bl");
var Step = document.getElementById("st");

Step.addEventListener("change", function (e) {
    if (Step.value > 50) {
        Step.value = 50
    }
    if (Step.value < 20) {
        Step.value = 20
    }
})

Box.addEventListener("change", function (e) {
    if (Box.value > 700) {
        Box.value = 700
    }
    if (Box.value < 100) {
        Box.value = 100
    }
    box.style.width = Box.value + "px";
    box.style.height = Box.value + "px";
})

Ball.addEventListener("change", function (e) {
    if (Ball.value > 50) {
        Ball.value = 50;
    }
    if (Ball.value < 10) {
        Ball.value = 10;
    }
    ball.style.width = Ball.value + "px";
    ball.style.height = Ball.value + "px";
})

window.addEventListener("keydown", function (e) {
    var key = e.key;
    if (key == "r") {
        ball.style.left = ((Number(Box.value) - Number(Ball.value)) / 2) + "px";
        ball.style.top = ((Number(Box.value) - Number(Ball.value)) / 2) + "px";
    }
    if (key == "ArrowUp") {
        var top2 = Number(ball.offsetTop) - Number(Step.value);
        if (top2 > 0 && Number(Step.value) < top2) {
            ball.style.top = top2 + "px";
        } else if (Number(Step.value) > top2) {
            ball.style.top = 0 + "px";
        }
    }
    if (key == "ArrowDown") {
        var top8box = Number(Box.value);
        top8box -= Number(Ball.value)
        var top8 = Number(ball.offsetTop) + Number(Step.value);
        if (top8 <= top8box && Number(Step.value) < top8box - top8) {
            ball.style.top = top8 + "px";
        } else if (Number(Step.value) > top8box - top8) {
            ball.style.top = top8box + "px";
        }
    }
    if (key == "ArrowLeft") {
        var left4 = Number(ball.offsetLeft) - Number(Step.value);
        if (left4 > 0 && Number(Step.value) <= left4) {
            ball.style.left = left4 + "px";
        } else if (Number(Step.value) > left4) {
            ball.style.left = 0 + "px";
        }
    }
    if (key == "ArrowRight") {
        var left6box = Number(Box.value);
        left6box -= Number(Ball.value)
        var left6 = Number(ball.offsetLeft) + Number(Step.value);
        if (left6 <= left6box && Number(Step.value) < left6box - left6) {
            ball.style.left = left6 + "px";
        } else if (Number(Step.value) > left6box - left6) {
            ball.style.left = left6box + "px";
        }
    }
});

buttons.forEach(button => {
    button.addEventListener("mousedown", function (e) {
        var btn = button.getAttribute('id');
        switch (btn) {
            case "1":
                var top1 = Number(ball.offsetTop) - Number(Step.value);
                var left1 = Number(ball.offsetLeft) - Number(Step.value);
                if ((top1 > 0 && Number(Step.value < top1)) && (left1 > 0 && Number(Step.value) < left1)) {
                    ball.style.top = top1 + "px";
                    ball.style.left = left1 + "px";
                } else if (Number(Step.value) > top1) {
                    ball.style.top = 0 + "px";
                } else if (Number(Step.value) > left1) {
                    ball.style.left = 0 + "px";
                }
                break;
            case "2":
                var top2 = Number(ball.offsetTop) - Number(Step.value);
                if (top2 > 0 && Number(Step.value) < top2) {
                    ball.style.top = top2 + "px";
                } else if (Number(Step.value) > top2) {
                    ball.style.top = 0 + "px";
                }
                break;
            case "3":
                var top3 = Number(ball.offsetTop) - Number(Step.value);
                var left3 = Number(ball.offsetLeft) + Number(Step.value);
                var left3box = Number(Box.value);
                left3box -= Number(Ball.value)
                if ((top3 > 0 && Number(Step.value < top3)) && (left3 <= left3box && Number(Step.value) < left3box - left3)) {
                    ball.style.top = top3 + "px";
                    ball.style.left = left3 + "px";
                } else if (Number(Step.value) > top3) {
                    ball.style.top = 0 + "px";
                } else if (Number(Step.value) > left6box - left3) {
                    ball.style.left = 0 + "px";
                }
                break;
            case "4":
                var left4 = Number(ball.offsetLeft) - Number(Step.value);
                if (left4 > 0 && Number(Step.value) <= left4) {
                    ball.style.left = left4 + "px";
                } else if (Number(Step.value) > left4) {
                    ball.style.left = 0 + "px";
                }
                break;
            case "5":
                ball.style.left = ((Number(Box.value) - Number(Ball.value)) / 2) + "px";
                ball.style.top = ((Number(Box.value) - Number(Ball.value)) / 2) + "px";
                break;
            case "6":
                var left6box = Number(Box.value);
                left6box -= Number(Ball.value)
                var left6 = Number(ball.offsetLeft) + Number(Step.value);
                if (left6 <= left6box && Number(Step.value) < left6box - left6) {
                    ball.style.left = left6 + "px";
                } else if (Number(Step.value) > left6box - left6) {
                    ball.style.left = left6box + "px";
                }
                break;
            case "7":
                var top7 = Number(ball.offsetTop) + Number(Step.value);
                var left7 = Number(ball.offsetLeft) - Number(Step.value);
                var top7box = Number(Box.value);
                top7box -= Number(Ball.value)
                if ((top7 <= top7box && Number(Step.value) < top7box - top7) && (left7 > 0 && Number(Step.value) <= left7)) {
                    ball.style.top = top7 + "px";
                    ball.style.left = left7 + "px";
                } else if (Number(Step.value) > top7box - top7) {
                    ball.style.top = top7box + "px";
                } else if (Number(Step.value) > left7) {
                    ball.style.left = 0 + "px";
                }
                break;
            case "8":
                var top8box = Number(Box.value);
                top8box -= Number(Ball.value)
                var top8 = Number(ball.offsetTop) + Number(Step.value);
                if (top8 <= top8box && Number(Step.value) < top8box - top8) {
                    ball.style.top = top8 + "px";
                } else if (Number(Step.value) > top8box - top8) {
                    ball.style.top = top8box + "px";
                }
                break;
            case "9":
                var top9 = Number(ball.offsetTop) + Number(Step.value);
                var left9 = Number(ball.offsetLeft) + Number(Step.value);
                var left9box = Number(Box.value);
                left9box -= Number(Ball.value)
                var top9box = Number(Box.value);
                top9box -= Number(Ball.value)
                if ((top9 <= top9box && Number(Step.value) < top9box - top9) && (left9 <= left9box && Number(Step.value) < left9box - left9)) {
                    ball.style.top = top9 + "px";
                    ball.style.left = left9 + "px";
                } else if (Number(Step.value) > top9box - top9) {
                    ball.style.top = top9box + "px";
                } else if (Number(Step.value) > left9box - left9) {
                    ball.style.left = left9box + "px";
                }
                break;
            default:
                location.reload();
                alert("Heeey Jack, Nabiyon ?")
                break;
        }
    });
});