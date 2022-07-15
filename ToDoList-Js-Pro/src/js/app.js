var addBtn = document.getElementById("add");
var input = document.getElementById("todo");
var ulTodos = document.getElementById("todos");
ulTodos.addEventListener("mouseover", function (e) {
    var times = document.querySelectorAll(".fa-times-circle");
    times.forEach(x => {
        x.addEventListener("click", function (e) {
            e.preventDefault();
            var element = e.target.parentElement;
            element.remove();
        })
    });
})


addBtn.addEventListener("click", function (e) {
    e.preventDefault();
    
    var text = input.value;
    text = text.trim();
    if(text=="" || text == null){
        alert("Yaz Birşeylər, Şənlənsin Ürəklər !");
        return;
    }
    const li = document.createElement("li");
    const p = document.createElement("p");
    const i = document.createElement("i");
    i.classList = "far fa-times-circle";
    p.innerText = text;
    li.appendChild(p);
    li.appendChild(i);
    ulTodos.appendChild(li);
    input.value = "";
});

var youtube = document.getElementById("h1");

youtube.addEventListener("click",function(e){
    // window.location.href = "https://www.youtube.com/channel/UCv1cilRYda9e8_07YWn4pIg";
    window.open("https://www.youtube.com/channel/UCv1cilRYda9e8_07YWn4pIg", "_blank");
});