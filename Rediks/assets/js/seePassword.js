let faEyes = document.querySelectorAll(".fa-eye");

faEyes.forEach(faEye => {
    faEye.addEventListener("click",function(e){
        let loginPassword = faEye.previousElementSibling;
        if(loginPassword.getAttribute("type") == "password"){
            loginPassword.setAttribute("type","text");
        } else {
            loginPassword.setAttribute("type","password");
        }
    });
    
});
