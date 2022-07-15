let AddNewActor = document.getElementById("AddNewActor");
let ModalAddNewActor = document.getElementById("ModalAddNewActor");
let ModalCross = document.getElementById("ModalCross");
let actorsContainer = document.getElementById("actorsContainer");
let cards = document.querySelectorAll(".card");
let updateActor = document.getElementById("updateActor");
var checkUpdateX;
var checkUpdateY;
document.onscroll = function (e) {
    updateActor.style.display = "none";
    updateActor.style.left = 0 + "px";
    updateActor.style.top = 0 + "px";
    checkUpdateX = 0;
    checkUpdateY = 0;
}
updateActor.addEventListener("click", function (e) {
    let searchingId = updateActor.getAttribute("data-id");

    fillUpdateInputs(searchingId);
    ModalCross.addEventListener("click", function () {
        location.reload();
    })
})
async function fillUpdateInputs(searchingId) {
    let allData = await GetAllData();
    allData.forEach(data => {
        if (data["id"] == searchingId) {
            updateActor.style.display = "none";
            updateActor.style.left = 0 + "px";
            updateActor.style.top = 0 + "px";
            checkUpdateX = 0;
            checkUpdateY = 0;
            xoddaADDi();
            actorNameCreate.value = data["name"];
            actorImageCreate.value = data["image"];
            let newUpdateBtn = document.createElement("button");
            newUpdateBtn.setAttribute("type", "button");
            newUpdateBtn.setAttribute("id", "submitUpdate");
            newUpdateBtn.innerText = "Update";
            newUpdateBtn.setAttribute("onclick", "putDataPlease("+searchingId+")");
            submitCreate.style.display = "none";
            ModalAddNewActor.append(newUpdateBtn);
        }
    })
}
function rightClickGetUpdate() {
    cards = document.querySelectorAll(".card");
    cards.forEach(card => {
        card.addEventListener('contextmenu', (event) => {
            if (card.getAttribute("data-id") != 0) {
                if (event.button == 2) {
                    event.preventDefault();
                    let updateX = event.clientX;
                    let updateY = event.clientY;
                    updateActor.style.display = "block";
                    updateActor.style.left = updateX + "px";
                    updateActor.style.top = updateY + "px";
                    checkUpdateX = updateX;
                    checkUpdateY = updateY;
                    updateActor.setAttribute("data-id", card.getAttribute("data-id"));
                }
            }

        })

        document.onmousemove = function (e) {
            if (!isNaN(checkUpdateX) && !isNaN(checkUpdateY)) {
                if (Math.abs(e.clientX - checkUpdateX) > 100 || Math.abs(e.clientY - checkUpdateY) > 100) {
                    updateActor.style.display = "none";
                    updateActor.style.left = 0 + "px";
                    updateActor.style.top = 0 + "px";
                    checkUpdateX = 0;
                    checkUpdateY = 0;
                }
            }


        }
    })
}
// function onMouseDown(e)
// {


//     if (e.which === 3 || e.button === 2)
//     {
//         console.log('Right mouse button at ' + e.clientX + 'x' + e.clientY);
//     }


// }



// Add New Actor Card

CreateAddNewActorCard()
function CreateAddNewActorCard() {

    let div1 = document.createElement("div");
    div1.className = "card-container";
    let div2 = document.createElement("div");
    div2.className = "card";
    div2.setAttribute("data-id", 0);
    let div3 = document.createElement("div");
    div3.className = "img-container";
    let div4 = document.createElement("div");
    div4.className = "body";
    div4.innerText = "Add New Actor";
    let div5 = document.createElement("div");
    div5.className = "empty";
    let span = document.createElement("span");
    span.id = "AddNewActor";
    span.setAttribute("onclick", "xoddaADDi()")
    span.innerText = "+";
    div5.append(span);
    div3.append(div5);
    div2.append(div3);
    div2.append(div4);
    div1.append(div2);

    actorsContainer.append(div1);
    AddNewActor = document.getElementById("AddNewActor");
}




async function GetAllData() {
    let data = await fetch("https://localhost:44388/api/actor");
    let actors = await data.json();
    return actors;
}

async function SendData() {
    let allData = await GetAllData();
    allData.forEach(data => {
        let html = `
        <div class="card-container" >
            <div class="card" onmouseover="rightClickGetUpdate()" data-id="${data['id']}">
                <img src="assets/img/cancel.png" alt="" class="animate__animated animate__rotateIn animate__faster cancel" onclick="(deleteCardFromDatabase(${data["id"]}))">
                <div class="img-container">
                    <img src="${data["image"]}" alt="ApiIntro">
                </div>
                <div class="body">
                    ${data["name"]}
                </div>
            </div>
        </div>`;
        if (data["isDeleted"] == true) {
            html = `
            <div class="card-container">
            <div class="card" onmouseover="rightClickGetUpdate()"  data-id="${data['id']}">
                
                <div class="img-container">
                    <img src="${data["image"]}" alt="ApiIntro">
                </div>
                <div class="body">
                    ${data["name"]}
                </div>
                <span class="isDeleted">deleted</span>
            </div>
        </div>
            `
        }
        actorsContainer.innerHTML += html;
    });
}

SendData();



// AddNewActor.addEventListener("click", function (e) {
//     ModalAddNewActor.style.display = "flex";
//     ScrolluKilidle();
// });

ModalCross.addEventListener("click", function () {
    ModalAddNewActor.style.display = "none";
    ScrolluAc();
})


function ScrolluKilidle() {
    document.body.style.height = "100vh";
    document.body.style.overflowY = "hidden";
}

function ScrolluAc() {
    document.body.style.height = "auto";
    document.body.style.overflowY = "auto";
}

function xoddaADDi() {
    ModalAddNewActor.style.display = "flex";
    ScrolluKilidle();
}

let submitCreate = document.getElementById("submitCreate");
let actorNameCreate = document.getElementById("actorNameCreate");
let actorImageCreate = document.getElementById("actorImageCreate");
function putDataPlease(id) {
    if (actorNameCreate.value == "") {
        actorNameCreate.focus();
    } else if (actorImageCreate.value == "") {
        actorImageCreate.focus();
    }
    else {
        let actorName = actorNameCreate.value;
        let actorIMage = actorImageCreate.value;
        let data = {
            Name: actorName,
            Image: actorIMage
        };
        $.ajax({
            url: "https://localhost:44388/api/Actor/"+id,
            type: 'PUT',
            dataType: 'json',
            data: JSON.stringify(data),
            contentType: 'application/json; charset=UTF-8',
            success: function (data) {
                actorNameCreate.value = "";
                actorImageCreate.value = "";
                ModalCross.click();
                location.reload();
            },
        });
    };
}
submitCreate.onclick = function () {
    if (actorNameCreate.value == "") {
        actorNameCreate.focus();
    } else if (actorImageCreate.value == "") {
        actorImageCreate.focus();
    }
    else {
        let actorName = actorNameCreate.value;
        let actorIMage = actorImageCreate.value;
        let data = {
            Name: actorName,
            Image: actorIMage
        };
        $.ajax({
            url: "https://localhost:44388/api/Actor",
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(data),
            contentType: 'application/json; charset=UTF-8',
            success: function (data) {
                actorNameCreate.value = "";
                actorImageCreate.value = "";
                ModalCross.click();
                location.reload();
            },
        });
    };
}

function deleteCardFromDatabase(id) {

    swal({
        title: "Diqqət!!!",
        text: "Silmək istədiyinizdən əminsiniz ? Silindikdən sonra geri gətimək olmayacaq !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: `https://localhost:44388/api/Actor/${id}`,
                    type: 'GET',
                    success: function (data) {
                        actorNameCreate.value = "";
                        actorImageCreate.value = "";
                        ModalCross.click();
                        location.reload();
                    },
                });

            } else {
                swal("Data- silinmədi !");
            }
        });



}


let findActor = document.getElementById("findActor");
let findActorName = document.getElementById("findActorName");
findActor.addEventListener("click", function () {
    if (findActorName.value != "") {
        if (findActorName.value.trim() != "") {
            FindAndSendData(findActorName.value);
        }
        findActorName.value = "";
    }
})


async function FindAndSendData(find) {
    actorsContainer.innerHTML = "";
    CreateAddNewActorCard();
    let allData = await GetAllData();
    allData.forEach(data => {
        if (data["name"].includes(find.trim())) {
            let html = `
        <div class="card-container">
            <div class="card"  onmouseover="rightClickGetUpdate()" data-id="${data['id']}">
                <img src="assets/img/cancel.png" alt="" class="animate__animated animate__rotateIn animate__faster cancel" onclick="(deleteCardFromDatabase(${data["id"]}))">
                <div class="img-container">
                    <img src="${data["image"]}" alt="ApiIntro">
                </div>
                <div class="body">
                    ${data["name"]}
                </div>
            </div>
        </div>`;
            if (data["isDeleted"] == true) {
                html = `
            <div class="card-container">
            <div class="card"  onmouseover="rightClickGetUpdate()" data-id="${data['id']}">
                
                <div class="img-container">
                    <img src="${data["image"]}" alt="ApiIntro">
                </div>
                <div class="body">
                    ${data["name"]}
                </div>
                <span class="isDeleted">deleted</span>
            </div>
        </div>
            `
            }
            actorsContainer.innerHTML += html;
        }
    });
}


