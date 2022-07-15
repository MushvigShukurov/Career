
function setDataToLocalStorage(data, name) {
    localStorage.setItem(name, data);
}





// function getAllCountryFromLocalStorage() {
//     return JSON.parse(localStorage.getItem("countries"));
// }



// function setQuestionsToLocalStorage() {
//     const countries = getAllCountryFromLocalStorage();
//     const questions = [];

//     countries.forEach((country, index) => {
//         const question = {
//             id: index,
//             flag: country.flags.png,
//             countryName: country.name.common
//         }
//         questions.push(question);
//     });
//     setDataToLocalStorage(JSON.stringify(questions), "questions");
// }






function getCountry(id) {
    let country = null;
    let questions = JSON.parse(localStorage.getItem("questions"));
    questions.forEach(question => {
        if (question.id == id) {
            country = question;
        }
    });
    return country;
}











function prepareRandomNumbers(count) {
    let randomNumbers = [];
    while (count > 0) {
        let randomNumber = Math.floor(Math.random() * 255);

        if (randomNumbers.indexOf(randomNumber) < 0) {
            randomNumbers.push(randomNumber);
            count--;
        }

    }
    return randomNumbers;
}






function prepareQuestion() {
    const randomNumbers = prepareRandomNumbers(4);
    let randomCountries = [];
    randomNumbers.forEach(randomNumber => {
        randomCountries.push(getCountry(randomNumber));
    })
    return randomCountries;
}





// if (!localStorage.getItem("countries")) {
//     getAllCountry();
// }


// if (!localStorage.getItem("questions")) {
//     setQuestionsToLocalStorage();
// }


function setQuestionToHtml() {
    let questions = prepareQuestion();
    
    const flag = document.getElementById("flag");
    const variants = document.querySelectorAll(".game-body > label > p");
    flag.src = questions[0].flag;
    console.log(questions[0].countryName);
    setDataToLocalStorage(questions[0].countryName,"correctAnswer");
    questions.sort(() => Math.random() - 0.5);
    variants.forEach((variant, index) => {
        variant.innerHTML = questions[index].countryName;
    });

    setDataToLocalStorage(JSON.stringify(questions), "settedQuestion");

}


setQuestionToHtml();


let checkAnswer = document.getElementById("checkAnswer");
checkAnswer.addEventListener("submit", function (e) {
    e.preventDefault()
    const variants = document.querySelectorAll(".game-body > label > p");
    variants.forEach(variant => {
        if (variant.getAttribute("data-id") == e.target.correctVariant.value) {
            const user = JSON.parse(localStorage.getItem("user"));
            const flag = document.getElementById("flag");
            const settedQuestion = JSON.parse(localStorage.getItem("settedQuestion"));
            // let checking = false;
            // settedQuestion.forEach(question => {
            //     if (question.flag == flag.src && variant.innerHTML == question.countryName) {
            //         checking = true;
            //     } else {
            //         checking = false;
            //     }
            // });
            if (localStorage.getItem("correctAnswer") == variant.innerHTML) {
                user.puan += 1;
                user.duzgunCavabSayi += 1;
                user.dogruCavabNomreleri.push(settedQuestion[0].id);
            } else {
                user.sehvCavabSayi += 1;
                user.sehvCavabNomreleri.push(settedQuestion[0].id);
            }
            user.sualSayi -= 1;
            if (user.sualSayi == 0) {
                setDataToLocalStorage("ok","end");
                window.location.href = "stopgame.html";
            }
            setDataToLocalStorage(JSON.stringify(user), "user");
            checkAnswer.reset();
            setQuestionToHtml()
        }
    })
})






setInterval(() => {
    setSecond();
}, 1000);


function setSecond(){
    let time = document.getElementById("time");
    const user = JSON.parse(localStorage.getItem("user"));
    if(user.saniye>0){
        user.saniye--;
        time.innerHTML = user.saniye;
    } else {
        setDataToLocalStorage("ok","end");
        setTimeout(() => {
            window.location.href = "stopgame.html";
        }, 300);
    }
    setDataToLocalStorage(JSON.stringify(user), "user");
}



