let form = document.querySelector("#profile_form");
let inputs = form.querySelectorAll("button");

form.noValidate = true;


form.onsubmit = function(e){
//    return false;
};

function inputsDisable(){
    inputs.forEach((element, i)=>{
        element.edit = false;
        element.parentElement.previousElementSibling.querySelector("input").disabled = true;
    });
    let passwordInput = document.getElementById("paswBut");
    passwordInput.edit = false;
    passwordInput.parentElement.previousElementSibling.querySelector("input").disabled = true;
    document.getElementById("rpassword").parentElement.parentElement.classList.add("hide");
}


// fioBut
document.getElementById("fioBut").addEventListener("click", function(e){
    let status = Boolean(e.target.edit);
    if(status === true){
        if(document.getElementById("fio").checkValidity()){

        }else{
            e.preventDefault();
        }
    }else{
        inputsDisable();
        document.getElementById("fio").disabled = false;
        e.target.edit = true;
        e.preventDefault();
    }
});

// adresBut
document.getElementById("adresBut").addEventListener("click", function(e){
    let status = Boolean(e.target.edit);
    
    if(status === true){
        if(document.getElementById("adres").checkValidity()){

        }else{
            e.preventDefault();
        }
    }else{
        inputsDisable();
        document.getElementById("adres").disabled = false;
        e.target.edit = true;
        e.preventDefault();
    }
});

// PhoneBut
document.getElementById("PhoneBut").addEventListener("click", function(e){
    let status = Boolean(e.target.edit);
    if(status === true){
        if(document.getElementById("phone").checkValidity()){

        }else{
            e.preventDefault();
        }
    }else{
        inputsDisable();
        document.getElementById("phone").disabled = false;
        e.target.edit = true;
        e.preventDefault();
    }
});

// CHANGE
document.getElementById("rpassword").onchange = function(e){
    if(e.target.value != document.getElementById("password").value){
        e.target.setCustomValidity("");
    }
}

// paswBut
document.getElementById("paswBut").addEventListener("click", function(e){
    let status = Boolean(e.target.edit);
    if(status === true){
        let passwordInput = document.getElementById("password");
        let rpasswordInput = document.getElementById("rpassword");
        if(passwordInput.checkValidity() && rpasswordInput.checkValidity()){
            if(passwordInput.value == rpasswordInput.value){
                document.getElementById("new_pass_notice").textContent = "Пароли не должны совпадать"; 
                rpasswordInput.setCustomValidity("Пароли совпали");
                e.preventDefault();
            }else{

            }
        }else{
            e.preventDefault();
        }
    }else{
        inputsDisable();
        document.getElementById("password").disabled = false;
        e.target.edit = true;
        document.getElementById("rpassword").parentElement.parentElement.classList.remove("hide");;
        e.preventDefault();
    }
});

// mailBut
document.getElementById("mailBut").addEventListener("click", function(e){
    let status = Boolean(e.target.edit);
    if(status === true){
        if(document.getElementById("mail").checkValidity()){

        }else{
            e.preventDefault();
        }
    }else{
        inputsDisable();
        document.getElementById("mail").disabled = false;
        e.target.edit = true;
        e.preventDefault();
    }
});

// Notice

let succsessNotice = document.getElementById("succsess");
if(succsessNotice){
    setTimeout(()=>{
        succsessNotice.classList.add("hide");
        succsessNotice.addEventListener("transitionend", (e)=>{
            succsessNotice.remove();
        });
    }, 3000);
}

// end Notice




