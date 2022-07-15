// var start = document.getElementById('start');
// start.addEventListener('click', function(e) {
//     e.preventDefault();
//     swal("Sabret dostum :)", {
//         buttons: false,
//         timer: 3000,

//     });

// })
location.reload = function() {
    location.href = './index.php';
}
window.onscroll = function() {
    var y = window.scrollY;
    if (y > 100) {
        document.getElementById('backtotop').style.display = 'inline-block';
    } else {
        document.getElementById('backtotop').style.display = 'none';
    }
}