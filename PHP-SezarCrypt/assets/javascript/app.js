// Sezar Area
let submitSezar = document.getElementById('submitSezar');

submitSezar.addEventListener('click', function(e) {
    e.preventDefault();
    let sezarMetn = document.getElementById('sezarMetn');
    let sezarKey = document.getElementById('sezarAcar');
    let sezarResult = document.getElementById('sezarResult');
    sezarMetn = sezarMetn.value;
    sezarKey = sezarKey.value;
    sezarMetn = [sezarMetn, sezarKey];
    let data = new FormData();
    data.append("sezarText", sezarMetn);
    let xhr = new XMLHttpRequest();
    let hrefimiz = window.location.href;
    let sezarUrl = hrefimiz + 'solve/c_sezar.php';
    xhr.open('POST', sezarUrl, true);
    xhr.onload = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            sezarResult.innerHTML = xhr.response;
        } else {
            sezarResult.innerHTML = "<span style='color:var(--exfav);'>Prosesdə xəta baş verdi!</span>";
        }

    }
    xhr.send(data);
    setTimeout(() => {
        document.getElementById('sezarMetn').value = '';
        document.getElementById('sezarResult').innerHTML = 'Nəticə :';
        document.getElementById('sezarAcar').value = '1';
    }, 10000);
});
// Calculator
let submitCalc = document.getElementById('submitCalc');
submitCalc.addEventListener('click', function(e) {
    document.getElementById('calcInput').disabled = true;
    let calcResult = document.getElementById('calcResultp');
    e.preventDefault();
    let calcValue = document.getElementById('calcInput');
    calcValue = calcValue.value;
    let calculateUrl = window.location.href + 'solve/calculator.php';
    let data = new FormData();
    data.append("calcValue", calcValue);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', calculateUrl, true);
    xhr.onload = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            calcResult.innerHTML = xhr.response;
        } else {
            calcResult.innerHTML = "<span style='color:var(--exfav);'>Prosesdə xəta baş verdi!</span>";
        }
    }
    xhr.send(data);
    setTimeout(() => {
        document.getElementById('calcInput').disabled = false;
        document.getElementById('calcInput').value = '';
        document.getElementById('calcResultp').innerHTML = '';
    }, 10000);
});

// Haqqimda

let haqqimdaabtn = document.querySelector('#haqqimda-a-btn');

haqqimdaabtn.addEventListener('click', function(e) {
    e.preventDefault();
    let haqqimdaBox = document.getElementById('haqqimda');
    if (haqqimdaBox.style.display != 'none') {
        haqqimdaBox.style.display = 'none';
        haqqimdaBox.style.marginLeft = '-100%';
    } else if (haqqimdaBox.style.display != 'flex') {
        haqqimdaBox.style.display = 'flex';
        haqqimdaBox.style.marginLeft = 0;
    }

});