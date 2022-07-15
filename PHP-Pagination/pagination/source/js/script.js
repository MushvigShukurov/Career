// var about = document.getElementById('aboutBTN');
// var posts = document.getElementById('postsBTN');
// var aboutC = document.querySelector('.about');
// var postsC = document.querySelector('.posts');

// about.addEventListener('click', function(e) {
//     e.preventDefault();
//     about.classList = 'active';
//     posts.classList = '';
//     postsC.style.display = 'none';
//     aboutC.style.display = 'block';
// })
// posts.addEventListener('click', function(e) {
//     e.preventDefault();
//     posts.classList = 'active';
//     about.classList = '';
//     postsC.style.display = 'block';
//     aboutC.style.display = 'none';
// })
var footerSiteName = document.getElementById('footer-site-name');
var footerSiteYear = document.getElementById('footer-site-year');
footerSiteName.textContent = 'Ustablogger.com';
let now = new Date().getFullYear();
footerSiteYear.textContent = now;