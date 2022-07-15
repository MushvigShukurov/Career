if(localStorage.getItem("end")){
    const user = JSON.parse(localStorage.getItem("user"));
    let stopName = document.getElementById("stopName");
    let stopTime = document.getElementById("stopTime");
    let stopCorrect = document.getElementById("stopCorrect");
    let stopWrong = document.getElementById("stopWrong");
    let stopQCount = document.getElementById("stopQCount");
    stopName.innerHTML = user.ad;
    stopTime.innerHTML = user.allT;
    stopCorrect.innerHTML = user.duzgunCavabSayi;
    stopWrong.innerHTML = user.sehvCavabSayi;
    stopQCount.innerHTML = user.allQ;

    localStorage.removeItem("end");
    localStorage.removeItem("settedQuestion");
    localStorage.removeItem("correctAnswer");
    localStorage.removeItem("user");



    
} else {
    window.location.href = "index.html";
}