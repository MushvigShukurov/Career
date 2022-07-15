var setBtn = document.getElementById('setValues');
var fontInput = document.querySelector("input[name='setFont']");
var colorInput = document.querySelector("input[name='setColor']");
var htmlElement = document.querySelector("html");


setBtn.addEventListener('click', function (e) {
    e.preventDefault();
    var fontSize = fontInput.value;
    var color = colorInput.value;
    htmlElement.style.fontSize = fontSize + 'px';
    document.documentElement.style.setProperty("--light", color);
    document.documentElement.style.setProperty("--leadcolor", color);
    document.documentElement.style.setProperty("--light-07", color);
    document.documentElement.style.setProperty("--headercolortext", color);
});
