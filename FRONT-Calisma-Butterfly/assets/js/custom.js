// Back To Top
var backToTop = document.getElementById('backToTop');
window.onscroll = function(e){
    if(window.scrollY>300){
        backToTop.style.display = "block";
    } else {
        backToTop.style.display = "none";
    }
}
backToTop.addEventListener('click', function (e) {    
    e.preventDefault();
    window.scrollTo(0, 0);
});