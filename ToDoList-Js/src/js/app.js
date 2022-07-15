function AddNewTodo() {
    let input = document.getElementById("todo");
    let todos = document.getElementById("todos");
    let times = document.querySelectorAll(".fa-times");
    var value = input.value;
    value = value.trim();
    if (value == "" || value == " ") {
        alert("Yaz birşeylər, Şənlənsin ürəklər!");
    }
    else {
        const li = document.createElement('li');
        const p = document.createElement('p');
        p.innerText = value;
        const i = document.createElement('i');
        i.classList = "fas fa-times";
        li.appendChild(p);
        li.appendChild(i);
        todos.appendChild(li);
        input.value = "";
    }
}
function DeleteItem() {
    let times = document.querySelectorAll(".fa-times");
    times.forEach(i => {        
        i.addEventListener("click", function (e) {
            i.click();
            e.target.parentElement.remove();
        })
    });
}



