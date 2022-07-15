var firstSectionLeft = document.getElementById('firstSectionLeft');
var firstSectionRight = document.getElementById('firstSectionRight');
var firstSectionBoardText = document.getElementById('firstSectionBoardText');
var firstSection = document.getElementById('firstSection');
var secondSection = document.getElementById('secondSection');
var instagram = document.getElementById('instagram');
var i = 0;
window.addEventListener('scroll', function() {
    i = window.pageYOffset / 10;
    firstSectionLeft.style.left = (-window.pageYOffset + "px");
    firstSectionLeft.style.opacity = (100 - i + "%");
    firstSectionBoardText.style.opacity = (100 - i + "%");
    firstSectionRight.style.left = (window.pageYOffset + "px");
    firstSectionRight.style.opacity = (100 - i + "%");
    firstSection.style.opacity = (100 - i + "%");
    secondSection.style.opacity = i + "%";
    if (window.pageYOffset > 100) {
        instagram.addEventListener('click', function(e) {
            e.preventDefault();
        });
        instagram.style.cursor = 'auto';
    } else {
        instagram.addEventListener('click', function(e) {
            window.open('https://instagram.com/mushvigsh', '_blank');
        });
        instagram.style.cursor = 'pointer';
    }
});