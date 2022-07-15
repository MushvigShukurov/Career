let startGameBtn = document.getElementById("startGameBtn");

startGameBtn.addEventListener("click", function (e) {
    e.preventDefault();
    let nameInput = document.getElementById("nameInput");
    let countInput = document.getElementById("countInput");

    if (nameInput.value.trim() == "" || countInput.value.trim() == "") {

        swal("Heyy :)", "RedX deyirki...Adınızı və Sual Sayını daxil edin!");
    } else {
        if (parseInt(countInput.value) >= 5 && parseInt(countInput.value) <= 20) {
            const user = {
                ad: nameInput.value,
                puan: 0,
                duzgunCavabSayi: 0,
                sehvCavabSayi: 0,
                dogruCavabNomreleri: [],
                sehvCavabNomreleri: [],
                jokerHaqqi: 0,
                saniye: (countInput.value * 5),
                sualSayi: countInput.value,
                allQ: countInput.value,
                allT: countInput.value * 5
            }
            setDataToLocalStorage(JSON.stringify(user), "user");



            window.location.href = "game.html";
        } else {
            swal("Heyy :)", "RedX deyirki...Sual Sayı maksimum 20, minimum 5 ola bilər!");
        }



    }
});


async function getAllCountry() {
    try {
        const response = await fetch("https://restcountries.com/v3.1/all")
            .then(data => data.json())
            .then(data => setDataToLocalStorage(JSON.stringify(data), "countries"));
    } catch (error) {
        console.log("Xeta Var!");
    }
}

function setDataToLocalStorage(data, name) {
    localStorage.setItem(name, data);
}




function getAllCountryFromLocalStorage() {
    return JSON.parse(localStorage.getItem("countries"));
}


function setQuestionsToLocalStorage() {
    const countries = getAllCountryFromLocalStorage();
    const questions = [];

    countries.forEach((country, index) => {
        const question = {
            id: index,
            flag: country.flags.png,
            countryName: country.name.common
        }
        questions.push(question);
    });
    setDataToLocalStorage(JSON.stringify(questions), "questions");
}

setInterval(() => {
    if (!localStorage.getItem("questions")) {
        setQuestionsToLocalStorage();
    }
}, 100);
setInterval(() => {
    if (!localStorage.getItem("countries")) {
        getAllCountry();
    }
}, 100);



